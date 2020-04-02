#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
@author: benoitcavallo
"""

import gpxpy
import serial as s
import datetime
import smtplib

ser=s.Serial()
ser.baudrate= 9600
#Configuration du port (9600 bauds) Donner le port COM associé Timeout : temps à partir duquel, une lecture sera considérée
ser.baudrate = 9600
ser.port= "COM7"
ser.timeout=3
date = datetime.datetime.now()
ser.open()
for i in range (1,10):
   x=ser.readline()
   if i != 1:  
       x = float(x[1:5])
       print(x) 
       f = open('temperature.csv', 'a')
       f.write(datetime.datetime.today().strftime('%Y-%m-%d') +" "+str(date.hour)+ ":" + str(date.minute)+ ":" + str(date.second))
       f.write(';')
       f.write(str(x)) 
       f.write('\n')
       f.close()
ser.close()
# Affichage 
points=gpx.tracks[0].segments[0].points
for i,point in enumerate(points):
    print('Point at ({0},{1},{2}) : {3}'.format(point.latitude, point.longitude, point.elevation,point.time))
for i in range (1,10):
       gpx_file = open('myFile.gpx', 'r')
       gpx = gpxpy.parse(gpx_file)
       gpx.write(datetime.datetime.today().strftime('%Y-%m-%d') +" "+str(date.hour)+ ":" + str(date.minute)+ ":" + str(date.second))
       gpx.write(';')
       gpx.write(str(x)) 
       gpx.write('\n')
       gpx_file.close()