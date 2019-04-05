# coding: utf-8

import socket
import time

IDtransac = "0x01"

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(("192.168.43.164",1111))

s.send(IDtransac.encode())
time.sleep(1)

file = open("/opt/lampp/htdocs/projetIsenJanvier2018/commande.txt","rb")
s.send(file.read())
file.close
