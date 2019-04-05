import socket

IDtransac = "0x00"

s=socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(("192.168.43.164", 1111))

s.send(IDtransac.encode())
