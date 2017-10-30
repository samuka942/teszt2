function szamol(){				
				with(document.teszt){
					
					var min_ered = (
						(tagol.value*1)+
						(nyelvtan.value*1)+
						(utalas.value*1)+
						(cimke_minoseg.value*1)+
						(cimke_mennyiseg.value*1)+
						(cimke_relev.value*1)+
						(kategorizal.value*1)+
						(sablon_kovet.value*1))/22;
						
					minoseg_vege.value = Math.round((min_ered*100));
					
					var hatar_ered = (
						(elkeszul_ido.value*1)+
						(wordpress_idozit.value*1)+
						(relevans_idosav.value*1)+
						(relevans_tartalom.value*1)+
						(elore_irt.value*1))/8;
					
					hatarido_vege.value = Math.round((hatar_ered*100));
					
					var fejlod_ered = (
						(fejlod_minoseg.value*1)+
						(hiba_javit.value*1))/10;
						
					fejlod_vege.value = Math.round((fejlod_ered*100));
					
					var vege_ered = (
						(fejlod_ered*0.5)+
						(hatar_ered*1.25)+
						(min_ered*1.25))/3;
					
					if((alairas.value * 1) == 0 || (naptar.value * 1 ) == 0 || (akadaly.value * 1) == 0){
						
						krit.value = "Igen";
						vege.value = 0;
						no_krit.value = Math.round((vege_ered*100));
					}
					else{
						krit.value = "Nem";
						vege.value = Math.round((vege_ered*100));
						no_krit.value = "0";
					}
					
					if(krit.value == "Igen"){
						document.getElementById("krit").style.backgroundColor = "red";
					}
					else{
						document.getElementById("krit").style.backgroundColor = "lightgreen";
					}
					
					
					if(vege_ered == 1){
						kovetelmeny.value = "Igen, tökéletesen!";
					}
					else if(vege_ered < 1 && vege_ered > 0.9){
						kovetelmeny.value = "Igen, hibák mennyisége elhanyagolható!";
					}
					else if(vege_ered < 0.9 && vege_ered > 0.8){
						kovetelmeny.value = "Igen, hibák mennyisége nem kritikus szintű!";
					}
					else if(vege_ered < 0.8 && vege_ered > 0.7){
						kovetelmeny.value = "Igen, hibák mennyisége elégséges!";
					}
					else if(vege_ered < 0.7 && vege_ered > 0.6){
						kovetelmeny.value = "Igen, hibák mennyisége a határértéken van!";
					}
					else if(vege_ered < 0.6 && vege_ered > 0.5){
						kovetelmeny.value = "Nem, hibák mennyisége túlságosan nagy!";
					}
					else if(vege_ered < 0.5 && vege_ered > 0.3){
						kovetelmeny.value = "Nem, újabb azonnali értékelés javasolt!";
					}
					else if(vege_ered < 0.3 && vege_ered > 0.25){
						kovetelmeny.value = "Nem, a cikk törlése, vagy átírása/átíratása javasolt!";
					}
					else if(vege_ered == 0){
						kovetelmeny.value = "Kritikus hiba!";
					}
					
					var d = new Date();
					
					var year = d.getFullYear();
					var month = d.getMonth();
					var day = d.getDate();
					
					var full_date = year+"."+(month+1)+"."+day;
					
					datum.value = full_date;
					
					if(fejl_terv.checked==true){					
						ref.value = "MND_"+"SzM"+"_"+"SGy"+"_"+full_date+"_"+dbszam.value+"_"+"FT";
					}
					else{
						ref.value = "MND_"+"SzM"+"_"+"SGy"+"_"+full_date+"_"+dbszam.value;
					}
					
				}
			}