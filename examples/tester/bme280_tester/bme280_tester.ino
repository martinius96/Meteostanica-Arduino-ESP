#include <Adafruit_Sensor.h>
#include <Adafruit_BME280.h>
//#define BME280_ADRESA (0x77)
#define BME280_ADRESA (0x76)
Adafruit_BME280 bme;
void setup() {
  Serial.begin(115200);
  bme.begin(BME280_ADRESA);
}

void loop() {
  float teplota = bme.readTemperature();
  float tlak = bme.readPressure() / 100;
  float vlhkost = bme.readHumidity();
  float nadmorska_vyska = bme.readAltitude(1013.25);
  float tlak_hladina_mora = tlak / pow(1 - ((0.0065 * nadmorska_vyska) / (teplota + (0.0065 * nadmorska_vyska) + 273.15)), 5.257);
  float tlak_hladina_mora2 = tlak / pow(1.0 - nadmorska_vyska / 44330.0, 5.255);
  float tlak_hladina_mora3 = tlak / pow(1.0 - 0.0065 * nadmorska_vyska / (teplota + 273.15), 5.255);
  Serial.print("Teplota = ");
  Serial.print(teplota);
  Serial.println(" *C");

  Serial.print("Vlhkost = ");
  Serial.print(vlhkost);
  Serial.println(" %");

  Serial.print("Absolutny tlak = ");
  Serial.print(tlak);
  Serial.println(" hPa");

  //RELATIVNY TLAK --> prepocitany na hladinu mora bosch vzorcom
  Serial.print("Relativny tlak (origo Bosch vzorec) = ");
  Serial.print(tlak_hladina_mora);
  Serial.println(" hPa");

  Serial.print("Relativny tlak (upraveny Bosch vzorec 2 - najviac odpoveda skutocnosti z merani) = ");
  Serial.print(tlak_hladina_mora2);
  Serial.println(" hPa");

  Serial.print("Relativny tlak (upraveny Bosch vzorec 3) = ");
  Serial.print(tlak_hladina_mora3);
  Serial.println(" hPa");

  Serial.print("Nadmorska vyska = ");
  Serial.print(nadmorska_vyska); /* Adjusted to local forecast! */
  Serial.println(" m.n.m");

  Serial.println();
  delay(10000);
}

