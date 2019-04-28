#!/usr/bin/python
# -*- coding: utf-8 -*-

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

np = neopixel.NeoPixel(machine.Pin(4), 8)
constraint = urequests.get('http://example.com?admin=no&question=%i')
constraint = constraint.json()
#loopmax = parsed[0][3]
loopmax = 72
#use only pure red green or blue and Max 72 pixels (20ma per LED) to prevent over current.

While True:
    for i in range(loopmax):
        response = urequests.get('http://example.com?admin=no&question=%i')
        parsed = response.json()
        time.sleep(30)
        url = parsed[i][0]
        find = parsed[i][1]
        calcdo = parsed[i][2]
        loopmax = parsed[i][3]
        response2 = urequests.get('url')
        parsed2 = response2.json()
        find2 = parsed2[find]
        if find2 == calcdo:
            green = (0, 128, 0)
            np.write(green)
        elif calcdo != find2:
            red = (255, 0, 0)
            np.write(red)
        else:
            print 'error'
            blue = (0,0,255)
            break


			
