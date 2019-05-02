import urequests
import network
import time
import machine
import neopixel

def connect():
    ssid = 'yourNetworkName'
    password = 'yourNetworkPassword'
    station = network.WLAN(network.STA_IF)
    if station.isconnected() == True:
        print 'Already connected'
        return
        station.active(True)
        station.connect(ssid, password)
    while station.isconnected() == False:
        pass
        print 'Connection successful'
        print station.ifconfig()

np = neopixel.NeoPixel(machine.Pin(4),72)
loopmax = 72
#use only pure red green or blue and Max 72 pixels (20ma per LED color) to prevent over current.

While True:
    for i in range(loopmax):
        response = urequests.get('http://example.com/led.php?login=device123&lednum=%s' %i)
        parsed = response.json()
        url = parsed[i][0]
        find = parsed[i][1]
        match = parsed[i][2]
        pause = parsed[i][3]
        time.sleep(pause)
        response2 = urequests.get(url)
        parsed2 = response2.json()
        find2 = parsed2[find]
        if find2 == match:
            green = (0, 128, 0)
            np.write(green)
        elif match != find2:
            red = (255, 0, 0)
            np.write(red)
        else:
            print 'error'
            blue = (0,0,255)
            np.write(blue)
            break
