//DEEPSLEEP ZAVEDENY, PREPOJTE GPIO16 (D0) s RST PINOM
// V OPACNOM PRIPADE NEBUDE SKETCH POUZITELNY, ESP SA NEPREBUDI WAKE VOVYODOM
#include <ESP8266WiFi.h>
#include <DallasTemperature.h>
#include <OneWire.h>
#include <Wire.h>
#include <SPI.h>
#include "Adafruit_BMP280.h"
#include <Adafruit_Sensor.h>
#define ONE_WIRE_BUS 0 //D3 DS18b20 pripojit na tuto zbernicu
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensors(&oneWire);
#include <DHT.h>
#include <DHT_U.h>
#define DHTPIN 14         // D5 na pripojenie DHT22
#define DHTTYPE DHT22
DHT_Unified dht(DHTPIN, DHTTYPE);
const char* ssid = "meno_wifi";
const char* password = "heslo_wifi";
const char* host = "www.arduino.php5.sk";
const int httpPort = 80;
WiFiClient client;
Adafruit_BMP280 bmp;
void setup() {
  sensors.begin(); //aktivujem senzory na OneWire zbernici
  bmp.begin();
  dht.begin();
  sensor_t sensor;
  Serial.begin(115200); //rychlost seriovej linky
  Serial.println();
  Serial.println("pripajam na ");
  Serial.println(ssid);
  WiFi.begin(ssid, password); //pripoj sa na wifi siet s heslom
  while (WiFi.status() != WL_CONNECTED) { //pokial sa nepripojime na wifi opakuj pripajanie a spustaj funkcie pre ovladanie v offline rezime
    delay(1000);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("Wifi pripojene s IP:");
  Serial.println(WiFi.localIP());
  odosli_teploty();
  skontroluj_reset();
  ESP.deepSleep(30e7);
}


void odosli_teploty() {
  sensors.requestTemperatures();
  sensor_t sensor;
  sensors_event_t event;
  dht.temperature().getEvent(&event);
  delay(500);
  client.stop();
  if (client.connect(host, httpPort)) {
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
    String url = "/meteostanicav2/system/nodemcu/add.php?teplota1=" + t1 + "&teplota2=" + t2 + "&teplota3=" + t3 + "&tlak=" + p + "&vlhkost=" + h;
    client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "User-Agent: NodeMCU\r\n" + "Connection: close\r\n\r\n");
    Serial.println("Hodnoty do databazy uspesne odoslane");
  } else if (!client.connect(host, httpPort)) {
    Serial.println("Nepodarilo sa odoslat hodnoty - chyba siete");
  }
}

void skontroluj_reset() {
  client.stop();
  if (client.connect(host, httpPort)) {
    String url = "/meteostanicav2/system/resetdosky.txt";
    client.print(String("GET ") + url + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "User-Agent: NodeMCU\r\n" + "Connection: close\r\n\r\n");
    while (client.connected()) {
      String line = client.readStringUntil('\n');
      if (line == "\r") {
        break;
      }
    }
    String line = client.readStringUntil('\n');
    if (line == "Cakam na potvrdenie restartu") {
      client.stop();
      if (client.connect(host, httpPort)) {
        String link = "/meteostanicav2/system/nodemcu/potvrdreset.php";
        client.print(String("GET ") + link + " HTTP/1.1\r\n" + "Host: " + host + "\r\n" + "User-Agent: NodeMCU\r\n" + "Connection: close\r\n\r\n");
        Serial.println("Reset potvrdeny - vykonany");
        delay(500);
        ESP.restart();
      } else if (!client.connect(host, httpPort)) {
        Serial.println("Neuspesne odoslanie informacie o resete");
      }
    }
  } else if (!client.connect(host, httpPort)) {
    Serial.println("Neuspesne pripojenie pre stav resetu");
  }
}
void loop() {

}
