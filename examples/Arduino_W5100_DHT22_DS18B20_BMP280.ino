#include <avr\wdt.h> //kniznica watchdogu
#include "Adafruit_BMP280.h"
#include <Adafruit_Sensor.h>
#include <SPI.h>                     //kniznica SPI
#include <Ethernet.h>                //kniznica k ethernet shieldu
#include <OneWire.h>                 //Onewire kniznica
#include <DallasTemperature.h>       //knižnica senzorov  DS18B20
#include <DHT.h>
#include <DHT_U.h>
#define DHTPIN 6         // D6 na pripojenie DHT22
#define DHTTYPE DHT22
DHT_Unified dht(DHTPIN, DHTTYPE);
#define ONE_WIRE_BUS 8               //definovany pin OneWire zbernice
OneWire oneWire(ONE_WIRE_BUS);       //inicializacia pinu
DallasTemperature sensors(&oneWire); //priradenie ds18b20 senzorov na onewire zbernicu
byte mac[] = { 0x20, 0x1A, 0x06, 0x75, 0x8C, 0xAA };
char server[] = "www.arduino.php5.sk";
IPAddress dnServer(192, 168, 0, 1);
IPAddress gateway(192, 168, 0, 1);
IPAddress subnet(255, 255, 255, 0);
IPAddress ip(192, 168, 0, 45);
EthernetClient client;
Adafruit_BMP280 bmp;
void setup() {
  sensors.begin();           //start senzorov ds18b20
  bmp.begin();
  dht.begin();
  sensor_t sensor;
  Serial.begin(115200);
  if (Ethernet.begin(mac) == 0) {                  //V PRIPADE ZLYHANIA NASTAVENIA DHCP
    Serial.println("Chyba konfiguracie, manualne nastavenie");
    Ethernet.begin(mac, ip, dnServer, gateway, subnet);
  }
  wdt_enable(WDTO_8S);
}
void odosli_data() {
  sensors.requestTemperatures();
  sensor_t sensor;
  sensors_event_t event;
  dht.temperature().getEvent(&event);
  delay(1000);
  float teplota1 = sensors.getTempCByIndex(0);
  float teplota2 = event.temperature;
  float teplota3 = bmp.readTemperature();
  dht.humidity().getEvent(&event);
  float vlhkost = event.relative_humidity;
  float tlak = bmp.readPressure() / 100;
  float nadmorska_vyska = bmp.readAltitude(1013.25);
  float tlak_hladina_mora = tlak / pow(1 - ((0.0065 * nadmorska_vyska) / (teplota3 + (0.0065 * nadmorska_vyska) + 273.15)), 5.257);
  String t1 =  String(teplota1);
  String t2 =  String(teplota2);
  String t3 =  String(teplota3);
  String h =  String(vlhkost);
  String p =  String(tlak_hladina_mora);
  if (client.connect(server, 80)) {
    client.print("GET /meteostanicav2/system/nodemcu/add.php?teplota1=");
    client.print(t1);
    client.print("&teplota2=");
    client.print(t2);
    client.print("&teplota3=");
    client.print(t3);
    client.print("&tlak=");
    client.print(p);
    client.print("&vlhkost=");
    client.print(h);
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
