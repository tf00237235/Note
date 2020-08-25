<?	

class Rsa
{
	
    public $privateKey = '-----BEGIN PRIVATE KEY-----
MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQDE7E5CufvhwIkw
7KkyZFhSrFTcd9iptWP8ktTlt7FroV9Ni08SfPdM+FVdUwBmD7fRKRM/3Ralq/kJ
Zzu5obAfTaKLWuwFty+USMpMruAaHHRVuSbKHTMwmxV5VB/HqTIzuBR9Ip6ER8Ap
3JBWuXqEr+Se4dbmXyTdDCI7/psx+3CeTUeKwD6gZ5snhMpDGNBhlqNYxjD40pHH
q7fedmaKi6VppmMjDDPp9WQK4DPIBBSTklfKCRQY1nMiYbUig1xyAb5yemkPfKTY
oHMGz7qAy4tqFNYxeyBerr+cKXOWIU6ylJCjJGlZlGEJ3kyi2rhZmPCBvnq3HzNJ
pstyy1v/AgMBAAECggEAULLqK2weLdiCIDuL5uu6Sj73E9ZFQt7j17iwaGdL3Oin
rpZ9U/1ENxW5neIK0sh0MtHbYpuO0VvVVaYpkpwRGfLtvqAHAxyb8e+Wf7BWhDzO
6+ZRYBhxRuT2+t6fm2nZ+dnhA5rxTRI+TKlnuTKPY9rVHMs+DvBEohV73gwru2Iw
E14FtQi9hCs71SZt2DBRXjnUPi5pAUFzCFNtx4ROwIr51wubaWdRpqnjh/yKTcHk
/Ixo8rUK9s7EblChsOE112ypsamAWMNI+EQfPCmWlJ51Oj2QCdA87eh2zlwOxUcK
kuVd0LX5UV8IjhfzJXWkuL2NKVM19LDDdjyCGSleUQKBgQDorbxT8PT+4+kDnUz8
Mdxm+4+SFHJTOKLNVq9EoJ2EYnn9d6i8ySu9DEvlLcZPf7+6S1nXn51LmIW2m2On
wHHRwoANKw9jj4+FVZdMiBmf656iO90G9y94PY82Ho+AAgYDdMniRcX7c9r9PSYi
lobQbY05J2eBIm6X2TG8tqG6OQKBgQDYqR+KHpbKEKeUUvCLRV1goiwkb4K+Hgiz
3g5XNWarOah1JjPh4Mt5cv6HQzT1scFgWYlYln6aOZc7ijuP3u2+CaonkUxnnBZS
otVgoyJ5pw6Zxcmsq7a45QyK5y3AvcqsiOUHvFZ9J52E4kkRILCmdl79CGFfIqSA
CO5NDHIn9wKBgCuhUFwpJbeaAvqTh3kO3HZPG5fXz6w9RYHdjFYBDChj0t4tju1/
h30WjjC2SaZknQ4QzRL6siMXwZMBRkmRc4ZSw3I0rdkMdWwaJZnLN4reQsvHD+Yb
ecJBQNZ0GpJ1Tq1dO/H7BWnmSp0L11fLBBKXSFD8S5NSYoyExKfPUzo5AoGAKLgY
WmAHXPCmXiT8WmBt/URdYXenrc19OzjHnzJFGncapvHIHHKgKzImjgtef7Kpsk8B
limqn5elSaZgLVjre6TbWtZe8rYOJ/e8fI4MY6q2/sWCcrZPAA7kPZLXMXs6BRUx
XjPSWXFBlIDm1JY9PPvQPGP/0N505i9HgimNpt8CgYAG9+PeGkXnScHwBzUoIAHY
SNTuD0ArIPJvGUvNGwf+Lfvr/3+NJrm+3Wyo/TRMWVCKAcQIYg7SfLgVxVvUDtYO
tBF83bjVX856d9TDnAdl76zQW36q10+hbyOmUGJordMoeGCY4b3BwVdOh91j/f7g
/Gn4KxagnUxH4U8ADRqq1w==
-----END PRIVATE KEY-----';

    public $publicKey = '-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxOxOQrn74cCJMOypMmRY
UqxU3HfYqbVj/JLU5bexa6FfTYtPEnz3TPhVXVMAZg+30SkTP90Wpav5CWc7uaGw
H02ii1rsBbcvlEjKTK7gGhx0Vbkmyh0zMJsVeVQfx6kyM7gUfSKehEfAKdyQVrl6
hK/knuHW5l8k3QwiO/6bMftwnk1HisA+oGebJ4TKQxjQYZajWMYw+NKRx6u33nZm
ioulaaZjIwwz6fVkCuAzyAQUk5JXygkUGNZzImG1IoNccgG+cnppD3yk2KBzBs+6
gMuLahTWMXsgXq6/nClzliFOspSQoyRpWZRhCd5Motq4WZjwgb56tx8zSabLcstb
/wIDAQAB
-----END PUBLIC KEY-----';
    
	/*
	public $privateKey = '';
	public $publicKey = '';
	*/
    public function __construct()
    {
		/*
		$resource = openssl_pkey_new();
		openssl_pkey_export($resource, $this->privateKey);
		$detail = openssl_pkey_get_details($resource);
		$this->publicKey = $detail['key'];
		*/
    }

    public function publicEncrypt($data, $publicKey)
    {
        
		$split = str_split($data, 117); 
		foreach($split as $part) 
		{ 
			openssl_public_encrypt($part, $encrypted, $publicKey);
			$encParam_encrypted .= "\n".base64_encode($encrypted);
		}
		 return $encParam_encrypted;
    }

    public function publicDecrypt($data, $publicKey)
    {
        
		$split = explode("\n",$data);
		foreach($split as $part) 
		{ 
			openssl_public_decrypt(base64_decode($part), $decrypted, $publicKey);
			$decParam_decrypted .= $decrypted;
		}
        
        return $decParam_decrypted;
    }

    public function privateEncrypt($data, $privateKey)
    {
		$split = str_split($data, 117); 
		foreach($split as $part) 
		{ 
			openssl_private_encrypt($part, $encrypted, $privateKey);
			$encParam_encrypted .= "\n".base64_encode($encrypted);
		}
		return $encParam_encrypted;
    }

    public function privateDecrypt($data, $privateKey)
    {
		
		$split = explode("\n",$data);
		foreach($split as $part) 
		{ 
			openssl_private_decrypt(base64_decode($part), $decrypted, $privateKey);
			$decParam_decrypted .= $decrypted;
		}
        
        return $decParam_decrypted;
    }
}


$rsa = new Rsa();


$rs	=	array(
			"data"=null
		);
$rs = json_encode($rs);


// 公鑰加密
$str = $rsa->publicEncrypt($rs, $rsa->publicKey);


echo "公鑰加密（base64）：\n", $str, "\n <BR>";
	
$privstr = $rsa->privateDecrypt($str, $rsa->privateKey);

echo "私鑰解密：\n", $privstr, "\n <BR>";

// 私鑰加密
$str = $rsa->privateEncrypt($rs, $rsa->privateKey);


echo "私鑰加密（base64）：\n", $str, "\n <BR>";

$pubstr = $rsa->publicDecrypt($str, $rsa->publicKey);
echo "公鑰解密：\n", $pubstr, "\n <BR>";


?>
