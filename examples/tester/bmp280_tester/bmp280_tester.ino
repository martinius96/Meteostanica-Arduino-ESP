#include "Adafruit_BMP280.h"
#include <Adafruit_Sensor.h>
Adafruit_BMP280 bmp;
void setup() {
  bmp.begin();
  Serial.begin(115200);
}


void loop() {
  float teplota = bmp.readTemperature();
  float tlak = bmp.readPressure() / 100;
  float nadmorska_vyska = bmp.readAltitude(1013.25);
  float tlak_hladina_mora = tlak / pow(1 - ((0.0065 * nadmorska_vyska) / (teplota + (0.0065 * nadmorska_vyska) + 273.15)), 5.257);
  float tlak_hladina_mora2 = tlak / pow(1.0 - nadmorska_vyska / 44330.0, 5.255);
  float tlak_hladina_mora3 = tlak / pow(1.0 - 0.0065 * nadmorska_vyska / (teplota + 273.15), 5.255);
  Serial.print("Teplota = ");
  Serial.print(teplota);
  Serial.println(" *C");

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
