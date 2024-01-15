#include <WiFi.h>
#include <HTTPClient.h>
#include <DHT.h>
#include <Wire.h>
#include <LiquidCrystal_I2C.h>

const char* ssid = "wifi ani";
const char* password = "wifi kencang ga bikin kembung";
const char* serverUrl = "http://192.168.134.251/joki/indro/koneksi.php";

#define DHT_PIN 13   // Tentukan pin yang terhubung ke sensor DHT22
int lcdColumns = 16;
int lcdRows = 2;

DHT dht(DHT_PIN, DHT11);

// Inisialisasi LCD
LiquidCrystal_I2C lcd(0x27, lcdColumns, lcdRows); // Sesuaikan alamat I2C dan ukuran LCD

void connectToWiFi() {
    Serial.print("Connecting to WiFi...");
    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED) {
        delay(1000);
        Serial.print(".");
    }

    Serial.println("Connected");
}

void setup() {
    Serial.begin(115200);
     lcd.init();
    lcd.backlight();
    dht.begin();
    connectToWiFi();
}

void sendDataToServer(float temperature, float humidity) {
    if (WiFi.status() == WL_CONNECTED) {
        HTTPClient http;

        String data = "temperature=" + String(temperature) + "&humidity=" + String(humidity);

        http.begin(serverUrl);
        http.addHeader("Content-Type", "application/x-www-form-urlencoded");

        int httpResponseCode = http.POST(data);

        if (httpResponseCode > 0) {
            Serial.print("HTTP Response code: ");
            Serial.println(httpResponseCode);
            String response = http.getString();
            Serial.println(response);
        } else {
            Serial.print("Error code: ");
            Serial.println(httpResponseCode);
        }

        http.end();
    }
}

void loop() {
  // Baca data dari sensor DHT11
  float temperature = dht.readTemperature();
  float humidity = dht.readHumidity();

  // Baca data dari sensor MQ-2


  // Tampilkan data di Serial Monitor
  Serial.print("Temp: ");
  Serial.print(temperature);
  Serial.print(" °C, Humidity: ");
  Serial.print(humidity);


  // Kirim data ke server PHP
  sendDataToServer(temperature, humidity);

  // Tampilkan data suhu di LCD
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Temp: ");
  lcd.print(temperature);
  lcd.print(" C");
  lcd.setCursor(0, 1);
  lcd.print("humi : ");
  lcd.print(humidity);

  delay(2000); // Tunggu 2 detik sebelum membaca data lagi
}
