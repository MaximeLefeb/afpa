//--------------------------------------------- 9.3
function nWord (str) 
{
	cpt = 1;
	if (str != 0) {
		for (i = 0; i<= str.length; i++) {
			if(str[i] == " ") {
				cpt++;
			}
		}
	} else {
		cpt --;
	}

	return cpt;
}

nWord("Bonjour tout le monde");

//---------------------------------------------- 9.4

function finder (str) 
{
	cpt = 1 ;
	for (i = 0; i<= str.length; i++) {
		if(str[i]=="a"||str[i]=="e"|| str[i]=="i"|| str[i]=="o"|| str[i]=="u"|| str[i]=="y") {
			cpt++;
		}
	}
	return cpt;
}

finder("Allo tout le monde");

//----------------------------------------------- 9.5

function delWordPart (str, iBegin, iEnd)
{
	return str.substring(iBegin,iEnd + 1);
}

delWordPart("Ceci est une alerte de niveau 1 attention :o !", 1, 7);

//------------------------------------------------ 9.6

function cryptographie (str)
{
	alphab = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
	crypt = str;
	for(i=0; i<= alphab.length; i++) {
		if (crypt[i] != " ") {
			if (crypt[i] == alphab[j]) {
				crypt[i] = alphab[j + 1];
			} else if (crypt[i] == "z") {
				crypt[i] = "a";
			}
		}
	}
	return crypt;
}

cryptographie("Ceci est un test de cryptographie pourrie");

//------------------------------------------------- 9.6 bis

function chiffrer (mot) 
{
	alphab = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
	for(i=0; i <= mot.length; i++){
		pos = function (lettre){
			for(j=1; j <= alphab.length; j++){
				if(alphab[j] == lettre) {
					return j;
				}
			}
			return -1;
		};

		if (mot[i] == "z") {
			mot[i] = "a";
		} else {
			mot[i] = alphab[pos+1];
		}
	}
}
//---------------------------------------------------- 9.7
	





	//regarder carnet pour correction de 9.7







//---------------------------------------------------- 9.8

function CryptoTrois(str, desordre) 
{
	alphab = desordre[""];

	for(i=0; i<=str.length; i++) {
		pos = function (lettre) {
			for(j=0; j<=alphab.length; j++) {
				if (alphab[j] == lettre) {
					return j
				}
			}
			return -1;
		};
	}
}

CryptoTrois("Vive les pates", ["z","b","i","p","a","e","r","t","y","u","o","p","f","d","s","q","w","x","c","v","n","b","l","m","h","g"]);

//------------------------------------------------------ 9.9

function CryptoVigenere (str)