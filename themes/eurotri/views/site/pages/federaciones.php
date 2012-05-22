<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$this->layout='column2';
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());

$this->pageTitle=Yii::app()->name." - Federaciones de triatlón";

?>


<div class="articulo">
			
    <div class="submenu clearfix">
            <ul>
                    <li><a href="#" class="on">Federaciones</a></li>
            </ul>
    </div>

    <h2>Federaciones de triatlón</h2><br><br>

    <div class="federaciones clearfix">
            <ul>
                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Española</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Ferraz+16,+3%C2%BA+dcha+madrid&aq=&sll=40.396764,-3.713379&sspn=10.954634,20.983887&ie=UTF8&hq=C%2F+Ferraz+16,+3%C2%BA+dcha&hnear=Madrid,+Comunidad+de+Madrid&ll=40.429211,-3.717198&spn=0.021397,0.040984&z=15&iwloc=A" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/espanola.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Ferraz 16, 3º dcha. <br>28008 - Madrid</span>
                                    </div>
                                    <div class="feder_phone">
                                            <span>915599305</span>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Andaluza</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=Estadio+de+la+Cartuja+sevilla&aq=&sll=37.384855,-5.990403&sspn=0.010741,0.020492&ie=UTF8&hq=Estadio+de+la+Cartuja+sevilla&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/sevilla.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>Estadio de la Cartuja, Pta. F Galería - Mod. 8 - Sevilla</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatlonandalucia.org" target="_blank">www.triatlonandalucia.org</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>954 460 298</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:fatriatlon@gmail.com" target="_blank">fatriatlon@gmail.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Aragonesa</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=Yag%C3%BCe+de+Salas,+16+teruel&aq=&sll=37.417056,-6.004651&sspn=0.011163,0.020492&ie=UTF8&hq=&hnear=Calle+de+Yag%C3%BCe+de+Salas,+16,+44001+Teruel,+Arag%C3%B3n&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/aragon.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>Yagüe de Salas, 16, 6º <br>44001 - Teruel</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatlonaragon.org" target="_blank">www.triatlonaragon.org</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>978 608 204</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:federacion@triatlonaragon.org" target="_blank">federacion@triatlonaragon.org</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Asturiana</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Dindurra,+20+-+1%C2%BA,+33202+-+Gij%C3%B3n&aq=&sll=40.343445,-1.108686&sspn=0.010712,0.020492&g=Yag%C3%BCe+de+Salas,+16+teruel&ie=UTF8&hq=&hnear=Calle+de+Dindurra,+20,+33202+Gij%C3%B3n,+Asturias,+Principado+de+Asturias&ll=43.538438,-5.657916&spn=0.010188,0.020492&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/asturias.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Dindurra, 20 - 1º, 33202 - Gijón</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.fatriatlon.org" target="_blank">www.fatriatlon.org</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>984 399 238</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:federacion@fatriatlon.org" target="_blank">federacion@fatriatlon.org</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Balear</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&q=Calle+de+Uruguay,+07010+Palma,+Baleares,+Islas+Baleares&aq=&sll=43.538438,-5.657916&sspn=0.010188,0.020492&ie=UTF8&geocode=FVsNXAIdFVMoAA&split=0&hq=&hnear=Calle+de+Uruguay,+07010+Palma,+Baleares,+Islas+Baleares&ll=39.587368,2.644401&spn=0.021663,0.040984&z=15" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/balear.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>Palma Arena Avda. Uruguay,s/n, 7010 - Palma de Mallorca</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.fetrib.com" target="_blank">www.fetrib.com</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>971 759 518</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:info@fetrib.com" target="_blank">info@fetrib.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Canaria</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Leon+y+Castillo,+26+-+28+3%C2%AA+35004+-+Las+Palmas&aq=&sll=28.110647,-15.418407&sspn=0.012397,0.020492&ie=UTF8&hq=&hnear=Calle+Leon+Y+Castillo,+26,+35003+Las+Palmas+de+Gran+Canaria,+Las+Palmas,+Islas+Canarias&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/canarias.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Leon y Castillo, 26 - 28 3ª 35004 - Las Palmas</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.fecantri.org" target="_blank">www.fecantri.org</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>928 381 568</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:fecantri@yahoo.es" target="_blank">fecantri@yahoo.es</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Cántabra</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Fernandez+Vallejo,+31++39300+-+Torrelavega&aq=&sll=28.110647,-15.418407&sspn=0.012397,0.020492&ie=UTF8&hq=&hnear=Paseo+de+Fern%C3%A1ndez+Vallejo,+31,+39300+Torrelavega,+Cantabria&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/cantabria.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Fernandez Vallejo, 31 B2 Iz 39300 - Torrelavega</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.fetricantabria.com" target="_blank">www.fetricantabria.com</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>942 058 587</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:fetricantabria@hotmail.com" target="_blank">fetricantabria@hotmail.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN DE<br>
                                    <span class="federname">Castilla y León</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+San+Jos%C3%A9+de+Calasanz,+40+local+47013+-+Valladolid&aq=&sll=43.343575,-4.046141&sspn=0.010221,0.020492&g=C%2F+Fernandez+Vallejo,+31++39300+-+Torrelavega&ie=UTF8&hq=C%2F+San+Jos%C3%A9+de+Calasanz,+40+local&hnear=47013+Valladolid,+Castilla+y+Le%C3%B3n&z=14" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/leon.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ San José de Calasanz, 40 local 47013 - Valladolid</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatloncastillayleon.com" target="_blank">www.triatloncastillayleon.com</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>657 56 77 57</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:federacion@triatloncastillayleon.com" target="_blank">federacion@triatloncastillayleon.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN DE<br>
                                    <span class="federname">Castilla la Mancha</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Aguja,+12++02006+-+Albacete&aq=&sll=41.652272,-4.728498&sspn=0.042006,0.081968&ie=UTF8&hq=&hnear=Calle+de+la+Aguja,+12,+02006+Albacete,+Castilla-La+Mancha&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/lamancha.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Aguja, 12 Bj. Iz. <br>02006 - Albacete</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatlonclm.org" target="_blank">www.triatlonclm.org</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>967 229 687</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:federacion@triatlonclm.org" target="_blank">federacion@triatlonclm.org</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Catalana</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=Rambla+Guip%C3%BAscoa,+23+-+25,+2on-D,+08018+-+Barcelona&aq=&sll=38.983413,-1.869904&sspn=0.010925,0.020492&ie=UTF8&hq=&hnear=Rambla+de+Guip%C3%BAscoa,+23,+08018+Barcelona,+Catalu%C3%B1a&z=16&iwloc=r11" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/catalana.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>Rambla Guipúscoa, 23 - 25, 2on-D, 08018 - Barcelona</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatlo.org" target="_blank">www.triatlo.org</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>933 079 332</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:fct@triatlo.org" target="_blank">fct@triatlo.org</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN DE<br>
                                    <span class="federname">Ceuta</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=Inst.+Ceut%C3%AD+de+Deportes+Pl.+Rafael+Gibert,s%2Fn,+51001+-+Ceuta&aq=&sll=41.414351,2.194153&sspn=0.01054,0.020492&g=Rambla+Guip%C3%BAscoa,+23+-+25,+2on-D,+08018+-+Barcelona&ie=UTF8&hq=Inst.+Ceut%C3%AD+de+Deportes+Pl.+Rafael+Gibert,s%2Fn,&hnear=51001+Ceuta,+Ciudad+de+Ceuta&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/ceuta.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>Inst. Ceutí de Deportes Pl. Rafael Gibert,s/n, 51001 - Ceuta</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatlonceuta.com" target="_blank">www.triatlonceuta.com</a>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:info@triatlonceuta.com" target="_blank">info@triatlonceuta.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Extremeña</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+L%C3%B3pez+de+Ayala,21+|+06200+-+Almendralejo&aq=&sll=35.888812,-5.312622&sspn=0.011387,0.020492&ie=UTF8&hq=&hnear=Calle+de+L%C3%B3pez+de+Ayala,+21,+06200+Almendralejo,+Badajoz,+Extremadura&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/extremadura.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ López de Ayala,21 <br>06200 - Almendralejo</span>
                                    </div>
                                    <div class="feder_phone">
                                            <span>924 677 865</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:federacion@triatlonextremadura.com" target="_blank">federacion@triatlonextremadura.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Gallega</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=R%2F+Castelao,+21++2,+27001+-+Lugo&aq=&sll=38.679849,-6.412132&sspn=0.010972,0.020492&ie=UTF8&hq=&hnear=Calle+de+Castelao,+21,+27001+Lugo,+Galicia&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/lugo.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>R/ Castelao, 21 entlo 2,<br>27001 - Lugo</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.fegatri.org" target="_blank">www.fegatri.org</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>982 251 345</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:fegatri@hotmail.com" target="_blank">fegatri@hotmail.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Madrileña</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=Av.+Salas+de+los+Infantes,+1+2%C2%AA+Del.+1,+28034+-+Madrid&aq=&sll=43.014127,-7.555183&sspn=0.010277,0.020492&ie=UTF8&hq=&hnear=Av+de+Salas+de+Los+Infantes,+1,+28034+Madrid,+Comunidad+de+Madrid&z=16&iwloc=r13" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/madrid.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>Av. Salas de los Infantes, 1 2ª Des. 1, 28034 - Madrid</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatlonmadrid.org.es" target="_blank">www.triatlonmadrid.org.es</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>913 646 398</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:federacion@triatlonmadrid.org.es" target="_blank">federacion@triatlonmadrid.org.es</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN DE<br>
                                    <span class="federname">Melilla</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Mallorca,8-+1%C2%BA+A,+52006+-+Melilla&aq=&sll=40.48831,-3.683463&sspn=0.010689,0.020492&ie=UTF8&hq=&hnear=Calle+de+Mallorca,+8,+52006+Melilla,+Ciudad+de+Melilla&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/melilla.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Mallorca,8- 1º A, <br>52006 - Melilla</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.melillatriatlon.es" target="_blank">www.melillatriatlon.es</a>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:melillatriatlon@hotmail.com" target="_blank">melillatriatlon@hotmail.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Murciana</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=Av.+Del+Mar,+10,+30880+-+%C3%81guilas&aq=&sll=35.276444,-2.944048&sspn=0.011474,0.020492&ie=UTF8&hq=&hnear=Av+del+Mar,+10,+30880+Aguilas,+Murcia,+Regi%C3%B3n+de+Murcia&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/murcia.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>Av. Del Mar, 10, 30880 <br> Águilas</span>
                                    </div>
                                    <div class="feder_phone">
                                            <span>968 414 009</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:ftrm@trimurcia.org" target="_blank">ftrm@trimurcia.org</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Navarra</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Paulino+Caballero,+13,+31002+-+Pamplona&aq=&sll=37.406778,-1.590306&sspn=0.011164,0.020492&ie=UTF8&hq=&hnear=Calle+de+Paulino+Caballero,+13,+31002+Pamplona,+Navarra,+Comunidad+Foral+de+Navarra&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/navarra.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Paulino Caballero, 13, <br>31002 - Pamplona</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.navarratriatlon.com" target="_blank">www.navarratriatlon.com</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>948 206 739</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:info@navarratriatlon.com" target="_blank">info@navarratriatlon.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Valenciana</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&q=Calle+de+Avellanas,+12,+46003+Valencia,+Comunidad+Valenciana&aq=&sll=42.813619,-1.641109&sspn=0.01031,0.020492&ie=UTF8&geocode=Ff1UWgIdtUn6_w&split=0&hq=&hnear=Calle+de+Avellanas,+12,+46003+Valencia,+Comunidad+Valenciana&ll=39.474216,-0.374351&spn=0.010849,0.020492&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/valencia.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Avellanas, 12 2LC D3, <br>46003 - Valencia</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatloncv.org" target="_blank">www.triatloncv.org</a>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:triatlocv@triatlocv.org" target="_blank">triatlocv@triatlocv.org</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Vasca</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=Paseo+de+Anoeta+n%C2%BA+5+20014+-+Donostia&aq=&sll=39.474216,-0.374351&sspn=0.010849,0.020492&ie=UTF8&hq=&hnear=Paseo+de+Anoeta,+20014+San+Sebasti%C3%A1n,+Guip%C3%BAzcoa&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/vasca.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>Paseo de Anoeta nº 5 <br>20014 - Donostia</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.triatloi.org" target="_blank">www.triatloi.org</a>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:etf@triatloi.org" target="_blank">etf@triatloi.org</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Alavesa</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Cercas+Bajas,+5+-Casa+del+Deporte+-+Vitoria-Gasteiz&aq=&sll=43.300297,-1.973663&sspn=0.010229,0.020492&g=Paseo+de+Anoeta+n%C2%BA+5+20014+-+Donostia&ie=UTF8&hq=C%2F+Cercas+Bajas,+5+-Casa+del+Deporte+-&hnear=Vitoria-Gasteiz,+%C3%81lava,+Pa%C3%ADs+Vasco&z=15" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/alava.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Cercas Bajas, 5 -Casa del Deporte - Vitoria-Gasteiz</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.fealtri.org/" target="_blank">www.fealtri.org/</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>945 133 702</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:garridopm@hotmail.com" target="_blank">garridopm@hotmail.com</a>
                                    </div>
                            </div>
                    </li>

                    <li class="clearfix">
                            <div class="federname_block">
                                    <p>FEDERACIÓN<br>
                                    <span class="federname">Vizcaína</span></p>
                                    <a href="http://maps.google.es/maps?f=q&source=s_q&hl=es&geocode=&q=C%2F+Jose+Maria+Escuza+16,+bajo+-+Vizcaya&aq=&sll=42.847889,-2.677032&sspn=0.020609,0.040984&ie=UTF8&hq=&hnear=Calle+de+Jos%C3%A9+Mar%C3%ADa+Escuza,+16,+48013+Bilbao,+Vizcaya,+Pa%C3%ADs+Vasco&z=16" class="google_maps" target="_blank">Localizar en Google Maps</a>
                            </div>
                            <div class="map">
                                    <img src="<?php echo Yii::app()->theme->baseUrl?>/images/federaciones/vizcaya.png">
                            </div>
                            <div class="feder_datos">
                                    <div class="feder_calle">
                                            <span>C/ Jose Maria Escuza 16, bajo - Vizcaya</span>
                                    </div>
                                    <div class="feder_web">
                                            <a href="http://www.asfedebi.com/triatloi" target="_blank">www.asfedebi.com/triatloi</a>
                                    </div>
                                    <div class="feder_phone">
                                            <span>944 423 960</span>
                                    </div>
                                    <div class="feder_mail">
                                            <a href="mailto:triatloi@asfedebi.com" target="_blank">triatloi@asfedebi.com</a>
                                    </div>
                            </div>
                    </li>

            </ul>
    </div>

</div>
