#include <DHT.h>
#include <DHT_U.h>
#define DHTPIN 6
#define DHTTYPE DHT22
DHT_Unified dht(DHTPIN, DHTTYPE);
void setup() {
  dht.begin();
  sensor_t sensor;
  Serial.begin(115200);
}

void loop() {
  sensor_t sensor;
  sensors_event_t event;
  dht.temperature().getEvent(&event);
  float teplota = event.temperature;
  dht.humidity().getEvent(&event);
  float vlhkost = event.relative_humidity;
  Serial.println("Teplota DHT22: ");
  Serial.println(teplota);
  Serial.println("Vlhkost DHT22: ");
  Serial.println(vlhkost);
  delay(5000);
}
