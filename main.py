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


response = urequests.get('http://example.com?admin=no')
parsed = response.json()
np = neopixel.NeoPixel(machine.Pin(4), 8)
while True:
    for i in range(144):
        url = parsed[i][0]
        find = parsed[i][1]
        calcdo = parsed[i][2]
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
            break


			
