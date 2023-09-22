import serial
import requests
def upload_vitals(vitals):
    url = "https://vmm-evisit.azurewebsites.net/api/vitals_upload.php"
    request = {
        "vitals": vitals
    }
    response = requests.post(url, data=request)
    return response.text
device = 'COM3'
print("trying")
arduino = serial.Serial(port='/dev/cu.usbmodemHIDPC1',baudrate=57600,timeout=.1)
while True:
    while arduino.in_waiting ==0:
        print("Trying")
    data = arduino.readline()
    datastr = data.decode('utf-8')
    dataclean = datastr.replace("\r","")
    dataclean = dataclean.replace("\n","")
    print(data)
    print(datastr)
    print(dataclean)
    print(upload_vitals(dataclean))