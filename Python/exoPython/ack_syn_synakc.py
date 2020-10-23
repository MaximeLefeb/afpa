#!/user/env/python7
# -*-encoding:utf-8-*-
from scapy.all import *

#Envoyer un Syn_Ack
test_syn_ack = Ether() / IP(dst='10.1.20.175',src='10.1.20.2') / TCP(dport=666,flags='SA', seq=1, ack=1)
test_syn_ack.show()
sendp(test_syn_ack)

#Envoyer un Syn
test_syn = Ether() / IP(dst='10.1.20.175',src='10.1.20.2') / TCP(seq=1 ,flags='syn')
test_syn.show()
sendp(test_syn)

# Envoyer un Ack
test_ack = Ether() / IP(dst='10.1.20.175',src='10.1.20.2') / TCP(flags='A', seq=SYNACK.ack, ack=SYNACK.seq + 1)
test_ack.show()
sendp(test_ack)
