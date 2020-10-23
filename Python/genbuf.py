import sys

def generation(var):
	char_min="abcdefghijklmnopqrstuvwxyz"
	char_max="ABCDEFGHIJKLMNOPQRSTUVWXYZ"
	nbr="0123456789"
	lg=""
	i=0
	while i < int(len(char_min)):
		j=0
		while j < int(len(char_min)):
			k=0
			while k < int(len(nbr)):
				lg=lg+char_min[i]+char_max[j]+nbr[k]
				if int(len(lg)) > int(var):
					return lg
					sys.exit(0)
				k+=1
			j+=1
		i+=1
		
	return lg


def nbr_arg(var,var2):
	chaine=str(var)
	print(chaine.find(str(var2)))


if len(sys.argv) == 1:
	print(" Usage: ",sys.argv[0]," nombre_arguments [valeur EIP]")
	sys.exit(0)

elif len(sys.argv) == 3:
	generateur=generation(sys.argv[1])
	nbr_arg(generateur, sys.argv[2])
	
else:
	generateur=generation(sys.argv[1])
	print(generateur)
