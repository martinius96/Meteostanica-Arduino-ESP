#include <avr\wdt.h> //kniznica watchdogu
#include <SPI.h>                     //kniznica SPI
#include <Ethernet2.h>                //kniznica k ethernet shieldu
#include <OneWire.h>                 //Onewire kniznica
#include <DallasTemperature.h>       //knižnica senzorov  DS18B20
#include <Adafruit_Sensor.h>
#include <Adafruit_BME280.h>
#define ONE_WIRE_BUS 8               //definovany pin OneWire zbernice
OneWire oneWire(ONE_WIRE_BUS);       //inicializacia pinu
DallasTemperature sensors(&oneWire); //priradenie ds18b20 senzorov na onewire zbernicu
//#define BME280_ADRESA (0x77)
#define BME280_ADRESA (0x76)
Adafruit_BME280 bme;
byte mac[] = { 0x20, 0x1A, 0x06, 0x75, 0x8C, 0xAA };
char server[] = "www.arduino.php5.sk";
IPAddress dnServer(192, 168, 0, 1);
IPAddress gateway(192, 168, 0, 1);
IPAddress subnet(255, 255, 255, 0);
IPAddress ip(192, 168, 0, 45);
EthernetClient client;
void setup() {
  sensors.begin();           //start senzorov ds18b20
  if (!bme.begin(BME280_ADRESA)) {
    Serial.println("BME280 senzor nenalezen, zkontrolujte zapojeni!");
    while (1);
  }
  Serial.begin(115200);
  if (Ethernet.begin(mac) == 0) {                  //V PRIPADE ZLYHANIA NASTAVENIA DHCP
    Serial.println("Chyba konfiguracie, manualne nastavenie");
    Ethernet.begin(mac, ip, dnServer, gateway, subnet);
  }
  wdt_enable(WDTO_8S);
}
void odosli_data() {
  sensors.requestTemperatures();
  delay(1000);
  String teplota1 = String(sensors.getTempCByIndex(0));
  String teplota2 = String(sensors.getTempCByIndex(1));
  String teplota3 = String(bme.readTemperature());
  String vlhkost = String(bme.readHumidity());
  String tlak = String(bme.readPressure() / 100.0F);
  if (client.connect(server, 80)) {
    client.print("GET /meteostanicav2/system/nodemcu/add.php?teplota1=");
    client.print(teplota1);
    client.print("&teplota2=");
    client.print(teplota2);
    client.print("&teplota3=");
    client.print(teplota3);
    client.print("&tlak=");
    client.print(tlak);
    client.print("&vlhkost=");
    client.print(vlhkost);
    client.println(" HTTP/1.1");                 // UKONCENIE REQUESTU ZALOMENIM RIADKA A DOPLNENIM HLAVICKY HTTP S VERZIOU
    client.println("Host: www.arduino.php5.sk"); // ADRESA HOSTA, NA KTOREHO BOL MIERENY REQUEST (NIE PHP SUBOR)
    client.println("Connection: close");         //UKONCENIE PRIPOJENIA ZA HTTP HLAVICKOU
    client.println();                            //ZALOMENIE RIADKA KLIENTSKEHO ZAPISU
    client.stop();
    Serial.println("Data uspesne odoslane!");
  } else {
    Serial.println("Neuspesne odoslanie dat - spojenie sa nepodarilo");
  }
}
void skontroluj_reset() {
  if (client.connect(server, 80)) {
    client.println("GET /meteostanicav2/system/resetdosky.txt HTTP/1.1");
    client.println("Host: www.arduino.php5.sk");
    client.println("Connection: close");
    client.println();
    while (client.connected()) {
      String hlavicka = client.readStringUntil('\n');
      Serial.println(hlavicka);
      if (hlavicka == "\r") {
        break;
      }
    }
    String premenna = client.readStringUntil('\n');
    if (premenna == "Cakam na potvrdenie restartu") {
      client.stop();
      if (client.connect(server, 80)) {
        client.print("GET /meteostanicav2/system/nodemcu/potvrdreset.php");
        client.println(" HTTP/1.1");
        client.println("Host: www.arduino.php5.sk");
        client.println("Connection: close");
        client.println();
        client.stop();
      }
      else {
        Serial.println("Pripojenie neuspesne"); //chyba ak nie som pripojeny
        Serial.println();
      }
      client.stop(); //ukonc spojenie

    }
  }
  client.stop();
}


void loop() {
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Chyba konfiguracie, manualne nastavenie");
    Ethernet.begin(mac, ip, dnServer, gateway, subnet);
    wdt_reset();

  }
  odosli_data();
  wdt_reset();
  skontroluj_reset();
  for (int i = 0; i <= 300; i++) {
    delay(1000);
    wdt_reset();
  }
}
