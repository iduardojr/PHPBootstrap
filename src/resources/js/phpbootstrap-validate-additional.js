(function ($) {
	
	jQuery.validator.addMethod("cpf", function(value, element) {
		value = value.replace('.','');
		value = value.replace('.','');
		cpf = value.replace('-','');
		if(this.optional(element))
		{
			return this.optional(element);	
		}
		while(cpf.length < 11) cpf = "0"+ cpf;
		var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
		var a = [];
		var b = new Number;
		var c = 11;
		for (i=0; i<11; i++){
			a[i] = cpf.charAt(i);
			if (i < 9) b += (a[i] * --c);
		}
		if ((x = b % 11) < 2) { a[9] = 0; } else { a[9] = 11-x; }
		b = 0;
		c = 11;
		for (y=0; y<10; y++) b += (a[y] * c--);
		if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
		if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
		return true;
	}, "Por favor, forne&ccedil;a um CPF v&aacute;lido."); 
	
	
	jQuery.validator.addMethod("cnpj", function(cnpj, element) {
	   // DEIXA APENAS OS NUMEROS
	   cnpj = cnpj.replace('/','');
	   cnpj = cnpj.replace('.','');
	   cnpj = cnpj.replace('.','');
	   cnpj = cnpj.replace('-','');
	   if(this.optional(element))
	   {
			return this.optional(element);   
	   }
	   var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
	   digitos_iguais = 1;
	
	   if (cnpj.length < 14 && cnpj.length < 15){
	      return false;
	   }
	   for (i = 0; i < cnpj.length - 1; i++){
	      if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
	         digitos_iguais = 0;
	         break;
	      }
	   }
	
	   if (!digitos_iguais){
	      tamanho = cnpj.length - 2;
	      numeros = cnpj.substring(0,tamanho);
	      digitos = cnpj.substring(tamanho);
	      soma = 0;
	      pos = tamanho - 7;
	
	      for (i = tamanho; i >= 1; i--){
	         soma += numeros.charAt(tamanho - i) * pos--;
	         if (pos < 2){
	            pos = 9;
	         }
	      }
	      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	      if (resultado != digitos.charAt(0)){
	         return false;
	      }
	      tamanho = tamanho + 1;
	      numeros = cnpj.substring(0,tamanho);
	      soma = 0;
	      pos = tamanho - 7;
	      for (i = tamanho; i >= 1; i--){
	         soma += numeros.charAt(tamanho - i) * pos--;
	         if (pos < 2){
	            pos = 9;
	         }
	      }
	      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	      if (resultado != digitos.charAt(1)){
	         return false;
	      }
	      return true;
	   }else{
	      return false;
	   }
	}, "Por favor, forne&ccedil;a um CNPJ v&aacute;lido."); // Mensagem padr&atilde;o 
	
	jQuery.validator.addMethod("phone", function(phone_number, element) { 
		return this.optional(element) || phone_number.match(/^\([1-9]\d\)\s[1-9]\d{3}-\d{4}$/);
	}, "Por favor, forne&ccedil;a um telefone v&aacute;lido.");
	jQuery.validator.addMethod("zipcode", function(cep, element){ 
		return this.optional(element) || cep.match(/^\d{2}\.?\d{3}-?\d{3}$/);
	}, "Por favor, forne&ccedil;a um CEP v&aacute;lido.");
	
	
	$.extend($.validator.messages, { dateITA: "Por favor, forne&ccedil;a uma data v&aacute;lida." });
}(jQuery));