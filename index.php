<?php
$grunt = '';
$dev = isset($_GET['dev']) ? true : false;
if(true === $dev) {
    $dev = '?a='.strtotime('now');
    $grunt = '<script src="http://192.168.1.154:35729/livereload.js"></script>';
}
?>
<!doctype html>

<html lang="en">
<head>
        <title>Wes Mantooth - HTML5 Canvas Game Engine - Version 2.x - by Jeremy Heminger</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Simple HTML5 Canvas game engine project">
        <meta name="keywords" content="html5,canvas,javascript,wes,mantooth,anchorman,ron,burgundy,game,development,programming,hobby,project,engine">
        <link rel="stylesheet" href="_/css/style.css<?php echo $dev ?>" />
</head>
<body class="wes_main">
    <div class="container">
        <h1>
            Wes Mantooth <span>- HTML5 Canvas Game Engine - Version 2.x - by Jeremy Heminger</span>
        </h1>
        <div class="left">
        <p>
            <pre>
,...............,,,,,,,...........,.......,,,,,.........................................................................................................................................................
`          `````..,...`````       `````` ```...``.``                                                                                                                                                    
`   ```    `...,,,:...````       `..```   ```..``.``                                                                                                                                                    
.``````    ``,,,:,:,.``.`        `````      ``.``..`                                                                                                                                                    
.```..`    ``.,::::,.``.``       ````        `..``.`     ``  ```                                                                                                                                        
.``.,..`   ```.:::::,`.,.`       ` `         `...```     ,`` `  .``.`                                                                                                                                   
,..,,,,,`` ..``:::,:,`.,.`                    ``````    ``.``   ````:`                                                                                                                                  
,,,,::::```.``.:::::,.,.`.`                    `````    `````````,...:` `  `                                                                                                                            
....,:::.....`.::,::,.,` `.`    `            `  ```     ``.,,`..`.`',::,.`````                                                                                                                          
....,,,,.,,,,`.::,,:,,,``.,.    `            ``  `    ```.,:',:,`.:';:;::,`....                                                                                                                         
``.`..,,..,,:,.::..::::,.,,.``  `                   ```.,,;;;;::`:;+';';:,..:,:                                                                                                                         
``.```.....:::.:,.`,:::,::,..`` `                   ``.,,:::;:,.:;''+'+':.,.;.,.                                                                                                                        
``.```....`::,,,.``,:::.::,.,.``    ```             .,,:..,;';,`,;''+++;.,`,::,:                                                                                                                        
``.``.....`:,.,,.`.,::,.,,,.,.``    ```             .,;:`.:;;';,;;''++':.`.:::.,                                                                                                                        
`````....,`,.`,..`.,,:.`...,,..`    ```             ,:'`,,:';;:;:`'+'+';..;';:`:                                                                                                                        
`` ``...,:.,.`....,,.:.````,...`     ``            `:''.'::::;:;.`++'+;';'+'';:;``                                                                                                                      
``  `...:;,,.```,,,,,,,`.``..`,`     ``            .;'';':.::;;;.,+++#++''+'+'::.`                                                                                                                      
``` `...:;;,.```,:,`.....``..`.     ````           ,;+;;+'::+''::''';+++'+''+;,;````                                                                                                                    
``````.`:;;,,.``,;.``.``.``..``  `` ``            `,'+;''';'++';'+'''+++++''+;;;```.                                                                                                                    
```` `.`,::,,,``,;,` `````.,.``  ```.`            ,,;':''''++''''++#++++++''''':.` ``                                                                                                                   
```` `.`.::.,,``,;,` ``` `.:...  `...``           .,;':''''++''+'+##++++++++'';;:.``,                                                                                                                   
```` ````,:.,,,..:,````` `,:.,.  `.,,.`         `.,:'+;'+:'+++++'++#++++++'+'';';;,.:                                                                                                                   
```.`  ``.:,.,:..:,,.``` `,:,:.```..,,.`        .;;+'+';+;'''++++'++++++++'+'';;:.;,:`                                                                                                                  
```.`  ``.,.,,:.,:,,,.`` `,:,:,.``.,,,,.`      `,:;++++'+#';+++++'++++#+++++++';;`::.`                                                                                                                  
```..` ``.,.,,.`,:::;.````::::,.``.,,:,.` `    ,:::'++++++'''+++#+++++#+++++++';:,,;,`                                                                                                                  
````````.,:.,.``.,:,;,`.`.,,:,..` `,,,..` `   `.,,,;++++++'+'+++++++++++''++++';:,,:..`                                                                                                                 
``````.`.,:,`` `..:.:,.,`,,,,...`  `....` ` `.,.:;;:+#++++++'+''''''+++++''+++';,..:..`                                                                                                                 
```` `.``,,.  ` .`,......,.,..,,.`````.```` .,;;';`.+##+++'';''''''''''++++''''':.`:;;``                                                                                                                
```` `.```..    .`.````.,,.,`.,:,..`````````.,:'',`;+##'';;;;;;;;';;;;''''''+''';,,:;:;.                                                                                                                
` `  ```````   `,..`````,,..``,,,..````...`,.::',.,;++';:::,..:;;;;;;;;;;;;'''''';:;;';:                                                                                                                
`    ```` `` ` `:.``````,:,```.,:,.......``:`:;::;,++';,..,`  .;;;;;;;;;;;;;;'+'+';;;'+'`                                                                                                               
`    `.`` `.```.:` `````,:.``.,.:,......```::';:'::'+:`   .   ,;;;;;;;;;;;::::'++'';;''':                                                                                                               
`   ``.`  `:....:`  ```.::`  ,:,,,,```.,.``;+:';;,;+;.    .   ,:::;:;:;;;::::::''+';;':':`                                                                                                              
` ``````  `;,,..,`  ```,:,` `,:,,::.``.....;';'';:+;,`    .` `,:::::::;:;::::::;''+';;'':`                                                                                                              
````````   :,...,`  .``.,,` `,:,:::,```.,,.:';+''''.`     .,`.::;;::;:;:::::::::;++';:'':.                                                                                                              
`````     `,.`.,,`  .``.,,` `,:,,:::.``....;''+'++,``     `:..::;:::;:;::::::,::;'+;;+'';:                                                                                                              
````      `.``.,,` `.`..,.``.::,.:;:,......;''+'+'``      `:,,::;;:::::::::::,:::;+'':+';,                                                                                                              
` .`  `   .....,,```.`..,```...`.,,:,...,,,:'';'',```   ``.:::::::::::::::::::::::'+';+';;`                                                                                                             
` `` `.   `.`..:,```.`.`,`.` ``````.,.....:;'''+:,``  ```.:::::;::::::::::::::::::;+'''';;,                                                                                                             
` ````,`  ```.`,.` `,`...``   ```` `.```.::'''';.``` `..,::::::;:::::::::::::::::,:+++''';.                                                                                                             
`  ```,. ``` ``:.`  ,`.:.``   ``    `  `:::'''+,.`` ``..,::::::;:::::::::::::::::,:;+'++';;                                                                                                             
`   `.,.```` ``:.`  ,.::.`    ``       .':,'++;.,`  `.,,:::::::;;::::::::::::::::,::+'++'':`                                                                                                            
`   ``..```` `...` `::;:.     ``       .+::'++,`.` ``,:::::::::;:::::::::::::::,:,,:+'++'':.                                                                                                            
`    `.``` ` `.`````;:,,`     ````     ,';:;''.`````,,::::::::;;;:;:::;;:::::::,,,,:''++'+::                                                                                                            
`    ```   ` `. ````;.`.``      ``    `:':,;;:..````,,::::::::::;:;:;;;;::::::::,,,:;++++','`                                                                                                           
. ` ```    .  .`````:``,``` `    ` `  ::+::;:,..````:::::;:;;::;;;;::;;;;:::::::,,,:;'++++.:,                                                                                                           
,``````    .` .  ``.,`.,``` `  `````  ;;++;';...```,::::::;;:::;;;;:;;;;;:::::::,,,:;'+++'';:`                                                                                                          
:,..```    .```  ``.,.:,.`  `  `````  ;;'++;,..````,,:::::;;;:;;;;;;;;;;;::::::,,,,,;;'+++'':.                                                                                                          
::::`..`  ```.`` ``,::;,,`  ``  `.``  ;,:'+;,.````.,,::::;;;;;;;;;;;;;;;;:::::::,,,,;;'++++';.                                                                                                          
:;;:...`  ```,`` ``;:;:..` `.` ``.`` `',::';:.```.,,::::::::;;;;;;;;;;;::::::::,,,,,:;'++++';.                                                                                                          
:;';..``  ``.,````,;;:,``` `.````.`  `;';;;;:.```.,:,,,:::;:;;;;;;;;;;:::::::,,,,,,,:''+++'''.                                                                                      ``                  
;'';..`.````,,```.;'':.`   ...`...`   .::;;;,.```,,,,,,:::::;;;;;;;;;;:::::::,,,,,,,:''++'''',                                                                                      ``                  
;';:..`....`,:..`.;';,,.```,,,,,,.``  `,:';;,.```,,,,,,::::::;;;;;;;:;;:::::,,,,,,,::;'++'';';                                                                                      ..`                 
;';:.,.```. `;..`.'':,,,```::::,.`````.:::;:,.``.,,,,,,,:::::;:;;;;;;:;:::::::::,,,::;''+++';'                                                                                     `,,`                `
;;:;..````. `;.,.,';:..,.``::::.``````,,,:;:,``...,,,,.,:::::::;;;;;:::::::::::,,,,,:;''++++;'                                                                                  ````,,`            `````
;;:;,`````` `;,,,;':,...```,:::.```` `:,.:,:............::::;::;;:;;:::::::::::,,,,,:;''++++';                                                                                  ```.,,.````      ``.,,..
;';;.```` `  :,.:';,....```,:,,`  ````;,:;::,...``````.,,:::;:::;:;;;::::::::::,,,,,:;'++++'';                                                                                  `..,,:,`..`    `..,:,,,,
;';:.` .` `  :,.,;:,....```.,..`  ````'`,,;,,,..`````..,::::;:::;:::::;;:::;::::,,,,,:;'+'++';`                                                                                  .,:::,,:,``  `.,::;,.,:
;';:.``.` `  ,,.,;,,.,.`......``  ```.+.,,::,,.`````,,::;;:;;;::;;::::;';;;;;;::,,,,,:;'+'++'';                                                                                 `,:;:::;',` ` `,,:::.,:;
;;:;,```  `  ,,.,'.,.,..,,..```     `.';::::,...```,:;''';;;;;::;;;:::;;''';;;::,,,,,:;''''+''.                                                                               ```,;;:;;'':.```.,.:;:,,:;
;:,::.``  `` .:,:;...,,.,,,.``   `  ``:',;:::,````.:;'++'';;;;:;;:;:::;;;';;;;:::,,,,:;''''+''.               `   `                                                           ...:;;;;;'':.`,,,:,:;:,.,;
:,.::,`   `` `;:;;..``..,.,.`   ``   `.',';::,.``,:;'''''';;;;;:;::::::::::::::::,,,,,:''''''';               .` `.``                                                         `:::;;;;''';,,::;';;;;;.,;
:,.:,.` ` ````;'':..```...::.``` `   ``',.;::,``.:;';;:;;;;;;;;:::::,,,::;;:::,::,,,,,:'+'''+';       ..`` ```..``..`                                                          ,:;;;'';';::;::'''''''::;
,,.,,`````. `.;'',.,.``...,,,`````    `,.`'::,``,;;;;;;;;;;:;;;::::,,,:;;;;:::,,,:,,,,:'+''''',       ,,,.`.,..,..,,.`                                                        ``;;;;';;';:,:;;;::;;';::;
.`...`````` `.;';,.....```...` ```    `.`,';:,`.:;::;;;;;;;;::::::,,,:;;;;;;::,,,,,,,,:;'''+''.      `:::,.::,,,,,,::`` `                                                     ``:;;;';;;;:;;;;:..,,;::,:
.``.....```  .:';,,..,.````````````    ..';;:,`.:::::;;'''';;:::::,,,:;;'''';:,,,,,,,,,;++++'':     `.:::..:::::::::,,.`.                                                ``   ``:;;;;:::::;::,:.`..,:,.,
`  ...`,`.` ``:';,,,.,.` `````   ``  ``.,;;;,,`,:::;;'+++'';;:::::,,:;;'''''';:,,,,,,,,;'++++':    `..,;:..,::;::::::..`.`                                             ` ````  `:;;;::,::;;::,:,`..,::,:
```.,` .``` ``,':.,...,.`.``       ````.:;'',,`,:::''++++++';:::;:,,:;''';'+';::,,,,,,,;+++++':    .,.,:,.`.;;;:::::,.```     ``                               ``     `.`..``  .;;;;,:::;;';;;;;,,,:;;:'
.```.`  ``` ``,':...`.,,,.`     ` ``,..,,:'':,`:::;;''+#+++'';::;::,;'';;:'++,;;,,,,,,,;+++++':    .:.,,`.`,;;::::,:,````     `.                              `````  `.,.,,,`  .:;;::;;;';';;'';:,:;'''+
...```  .`````,':..,.`,:,``     ```.,,.,,;+':,`::;;'::+##+++';:;;::,;+'';:'+:,;;,,,,,,,;++++++;``  .:.:.```.,:,:::,:,``````   `.```                         ``...,`  `,,,,,,````,::;'''''';::';:,`.;'''+
...  ` `.`.``.:',``,.`,;,` ``   ```,,,,.:''',,.::;';.;++#'++';:;;;::''++;:++,.;;:,,,,,,;++++++:,.  `..:,`````:.:::,::.`````  ``.`..                       ```..,,:` `.,,,,::.```.,::''';';;:,::,.``.,'''
.`.    ```:`.::;`  ```,;,``.`    ``...,,:;'',,.:;'+:.,++#'#+';:;;;::''++''+';:;;,,,,,,,:+++++';:.  `.,::,.```:.:;,,::,.`.,.`..`.`..                      `.,,:::::``.`,:,,;;,.``,:::;;;;;:,;::::,.```;';
````     `;..:,'`     `::.`..     ````.:;';',,,::'',,,++++++';:;;;:,;'''';;;;::,,,,,,,,:+++++:':..``.,::,.``.:,,;`.:::,.,,.,,.`.```                     `.,::;:;;:.,.`.:,:;';:,,::::;;;::,.:;;;;;,.``;;:
` `       ;`..`'`     `:::..`     `` ``,,;;'.,,:;;';;;'''++'';:;;;::;''+';;:,,,,,,,,,,,,++++;,';::.`..::.....,,.:``::::,,:.,,.`,.`                     `.:::;;;;;;,:` .;:;;';;;:;;;;;:;:,.`,::::::,``;;:
`         ,..``;`   ` `,,:```     `    ,.::;.,::::::;;;''++';:::;;:::;''';::,,,,:,,,,,,,++++::#:;:.``.,:.`....,,:``,,::.:,,,,`..,`                    `.,:;;;;;;;:,,` .::;;''';;;;'';:::..`,,:,....``:;;
`         ,..``;`   `  ..:`       `    `,,;;.,:::,,::;;'++'';::;;;:::;;';;;::,,:,,,,,,,,'+'+'+':;,.`.,,:,```.`::,`.,,::,:,::.`...`                     ,,:;;;';;;:,.` .:;'''''';;;'';;;:...,::,````.,:;'
`         `,.``;`      ..,`       `     ,,;;.,:::,:::;;'''';;::;;::::;;';;;;;::,,,:,,,,,'+'++:;,:..`.:::,  `..::.`,,,:,::,:,````.`                     ..,;;';;;;::,``,:'';;''';;;;''';:..:;';:.`...;;:;
`          :. `;      `...`              .;:..,::,::;;'''';;:::;;:::,:;;;;;:;::,,:::,,,,'+'+:,;.````,::,,  `,.:..,:,,,,::,.`  `...`                   `...,;;;;;;,::..:;';;;''';;;;'';;:,,;'+';:::,.;;,,
.          ,`  ;` `   ````               `';..,:,::;;;;;'';;::::;;:,,::;;;;::::,::::,,,,;+++:,:``` `:;:,,``..`..::,.::;;:,.`  ``...`               ```.,...:;;;;:,:;:,;'';;';;':::;;;:;;::'+++'';;';';,,
,`         .` `;```   ````               `;:..,:,,::;;;';;;::::;;;:,,,::;;;:::::::::,,,,;++;,..``  `::...  `` ``,,.,:;;;::..`  ``.``               `..,,..,:;';::,:;';;';;'';:;:::;::;;:,:'++++';'+'';,,
:`         `.`.;` `   `.``               `::..,,,::::;;';;:::::;;;::,,,::;;;;;::::::,,,,;+';,,`  ` ,::``.   `  `...:;;::::,,.````.`` `..           `::,:.,:;;;;:,,;;;'::;;;;;;;:;;;::;;.`,''+'+'''''':.,
,`          ,`,;` `   ``                 `;:..,,,:::;;;;;;:::,:;;;:::,::::;;;;::::,,,,,,;+';.:` ```:;:``.   ` ``.`.;;,,:,..,:.`.`.`` `,,`          .::::,:;:;;;;::::;;:;;;;;;';::;::;';` ,;'''''+;;';,.:
.`          ;.,:` `  ``                  `;:....:::;:;;;;;:::,::;;,::::::::;;;::::,,,,,,;+',.,` ``.;;:.`.    `````.,;,.:.``.,.`,.``` `.:`          `::;:,;:,::;;:::;;::;;:::;';::,,:;':` ,:;''''+;:''::'
``         `:.,:`   `.`                  .;:....,::;;;:::;;::,::::,,,,:::::::;::,,,,,,,,;+;..:` ``,:;:...  ``.```.,.;,.,.``.,..,.`````.,`          `:;;;,;:.:,:;:,::::;;;:::;;:;;:,:'':,.,:;''''';:'';;'
`          `,.;:`   `.`                  ,;:....,:::;:::;;;,,,,:::...,,;::::::::,,,,,,,,;+;,.;.```,;:,,:```.,,..`,,.;....``.,,...``.```.`           ,;;;:;;.:,::::::,:;;;::::::'':::';;;;:;''+';';;'';';
``         `.`;,`   `                    :;;....,:::::::;;;,:,:::,.,',,:::::::::,,,,,,,,'+;,.;...`,:.,;:```.:,,,`:,:;..,..`.:,`````.` `.            ,;;;;;;::::::::::;::;;:::;:;;;;;';;'':;'''';'';;''';
.`          .`;.   `                    `:;;...,,:::::::;;:,+':,:,:##:,;;::::::,,,,,,,,,'+:,,:,,,`.,`.,`  .::,,. :,,..`..``.,:`````.  ``            .;;;;;;:;::;::;;;;::;':,,::,:';''';;;:;;''':''';;';;
`           `,;.  `                      ,';...,::::::::;';:+#',:,+##:,;;:::::,,,,,,,,,,'+,:,:.,. `.```` `,:,,.. .```.``,```,:,` ```              ` .;;;;;;.,::::;::;;:;;;:.,`.,,';''';;;;;;''';'';;;';;
`           `:'. ``                      ,''..,,:::::::;;';:+#+::,'#+:,;;;:::,,,,,,,,,,,'+,,,,.:.  ``  ``.::,... ```````..``.::`````             `,`.;;;;;;`,,,:::,,;;;;;':.``.,,:.;;';;;';:;'''';;;;;;'
`            .;,```                      :'',.,:::::::;;;;';;'';::;;:::;;;:::,,,,,,,,,,:;+:,.,.,` ``````.,,,,... ```````..``.:;` ` `             `:..;';;;:`:,,::,,:;';;;';,` .,,.`,;;;;'+;::;'';;:;';;'
`            `;;`                        :;',.,:::::::;;;;'';;;;;;;::;;;;;::,,,,,,,,,,,:'';,,,,` `.```..,,,,,.`` `..````....,:;`                 `,,.;;';;:,;::::::;;;;:;';,. `.```.:';;'+;::;''::;;';;'
.`            ,;`                        ,;;,.,:::::::;;;;;;;;;;;;;;;;;;:;::,,,,,,,,,,,:'';,,,,  ````..,,,,,,,`` .,,`.````.,::;.                 `,,,;;;:;;:;;;;;;;;,,:;;;',.  `` `.;''''';:;;';:,;;';;'
.`            `;`                        ,;::.,::,::::;;';;;;;;;;;;;;;:::;;:,,,,,,,,,,,,'';,,:.  ,....,,:,,,,.   .:,,,` ```,,,,.                  ,,:;;;:;;:;;;;;;;:..,;;;;,.` `  `.:;''''';'+'',,;;::;;
.`             ;`            `           .:;:.,::,,::::;';;;;;;;;;;;;;;::;;:,,,,,,,,,,,,;';,.`` `,,,,,,,,,,,,` ` ,:,,``  ``.```                   `.,,::,;:,::;;;;:,```:;;;..` ````.:';';;;;++'',,::,,:;
.`             ;`                        .,';,,::::,::;;;;;;;;;;;;;;;;::::;:,,,,,,,,,,,,:',`   `.,,,,,,:,,,.`````:::.     ``                      ``,.,::;:,,,:;;;;:.``,:;;``` ` ..,;'';;;,,;''':,:;,,::
.`             ;.                        .;';,,:::::::;;;;;;;;;''';;;;;:::;:,,,,,,,...,,..     `,,,,,,,:,,,....`.:::`    `.`                      .`:,::;;;:,,;;;;:;:,`..:;.`    .,:;;''';,.,;;;;::;::::
`              ;,                        .:+;,,::::::::;;;;;;;;;';;;;:::::::,,,,,,``````   ````.,,,,,,,,,,,,,.,.,:.:.   ``:.    `               `..`;;:;;;;:,:;;;:.:,,```:::```  ..;;;;;;;,,,;;;;;;';'::
`             `:.                        .:+;,::::::::;;;;;;;;;;;;:;;:::::::,,,,,```..`` ``.``.,,,,,:,,,,.:,:`:.:.`,`   ``,`  ``.``             `,.,;;:;;;;;;:;;;,`.`.```:::.````..::;;;;:,:;;;;:;;';;,;
`             `:.`                       .:';,,:::::::;;;;;::;;;;;;:::::::::,,,,.`.,,.````.:`,,,,,,:,,,,,.,,,.:,,``.``   `.    .,.,             `..::::;;;;;;;;';:``````.:;..````:.::;;;;:,:'';;:';;:::'
`              ::`                       .:';,,:::::::;;;;::;;;;;:::::::::::,,,,`,:;,.````,;.::,,,,:,,,,.`..`.,..``..     .  ``,:,,`            `..::::;;;;;;:;;;:.``   .:;`.`` `:::;;;:::,,''';:';:.,,;
`              ,:                        .;';,,:::::::;;:;::;;;;::;::::,:::::,,``:;;,`````,':;:,,,,,:,,..``. `,`.``.`    `,``..,,,,.             ,.,:::;;;;;:::;;:````  `:;```` `:';';;:::,:''';;';,`.,:
`              ,,                        .;':,,:::::::;;:::;;;;;;;;;::,,,:::,,,`.:;;,```  `;;;:,,,,,,,...``.  ,`` ``     .:....:,,:,             :,,,,:;;;;;:::;;;.`.`  `::``..`.:;;';;::;;;;;;;;''.`.::
`              :.                        .:':,,:::::::;;;;:;;;'::::;;:,,,,:,:,``,;;;:..`   `:;;:,,,,,,.````,  .`  ``     ::.,.,;,::,             ::,..::;;';;;:;;;:,.````:,.`,;,,:;;;;;;:;;';;';'''``.::
`              :.                        `,,,,::::::::;;;::;;;;,.,..;::,,,,,,, `:::;::.`    `.;::,,,,.   `.:  `,  `     `:;.`.,,....             ::.``,;;;;;;;:;;;;:.`..,;,.`.;,::;';;;;;;;;;;'''''``.,:
`              ;,                        `.,,,,::::,::;;;:;;'''..:,,+;:,,,,,:` .:;;;:,``` `  `.;::,,,`   ``.` `,  `     .::,``.`````             :.`  ,;;;';;;;;;;;;..,,:;;,`,;,,;;';;;;;;;;';';;;'...,:
`             `;,                         ,,,,::::::::;:;:;;'##++####'::::,,. `.;;;;:.``````  `,;:,,,    ` `. `:  ``   `,,,,````                 ,`   :;;;;::;;;;;'';:;::;;.,:;..;;;:;:;;;;;;;;:;';,:,,;
`             .;.                         ,,,:::::::::;;;;''##+#######';::,,  `,;;:;:,..````````,,,..  ` `  ,``;````  `.,,..``.`     ``          ``   :;;;:,:;;;;;'';;;;:;:`,;:..,:;:;:;';;::;;:;;;:;;:;
`             :;`                        `..,:::::,:::;;;;'+###+++++##+';::. `.:;;:;:,,.````````.,... `.`` `,..; .`   `..,,.`.,.``.` `                :;;;:.,;:;;;''';;;:;:....,``.:,;::;;::;';:;;::';:;
`             ::                         ``,,:::::::::;;;'++##++++++++++';:``,;;;;;::,,..````````....`,:..``...;`,`  ```,,,``.,,,.:` `               `:;:;:,,;:;;;''';;;;;:,,``,` `,,;::;;::';;;;;:,'';;
`            `;:                        ````,::::::::::;;'+#++++++++';;';;.`.;;'';;;::,...````........:,,...`.`:..   ``.::..`,,,,,.`                 .:;;;:..;:;;;;::;;;;;::,` `` `.:;::;::;;;:;;::;;';;
`            .;,                         ```,::::::::::;;''';;'''''';;;;::``,;''';;;:,,.....`.::,,..``:.,.,..,..,`   `.,::..`,,...                   .,;:;,``,:;:,:,:;;;;;;;:`  ` `,;;;;::,;;;::;;:;;';;
`            :;`                         ` `,::::::;:::;'';;;;'''''';;;:,.`.:;'''';;;:,,.....:;;:,.` `,.,.,...,`.     .`,:.``,,.``  `                `.:::.  ,:;:.,.:;;;;;;;,`  ``,,:;;';,,:;;:,:;,;';;;
`            ;;`                        `` .:::::::;:::;';;;;;;;;'';:::,.`.,:;'''';;;:,,..,,:;;::,.  `,`..,.,.:.,`    .`,.,`.,`.````                  `:::.  ,;;:.::';:::;;:.`   ,,:,:'';..::;;,::,;;;;;
`           .;:                          ` `,:::::::::;;';;;;;;;;;;:::,,``.,:;;''';;':,,.,,::;;::,.  `,``.,,,,:.:`   `.`,..`.```````                  `,::`  ::;;,;;;;:.,:;,,..  ,,:..'';,.,:::.,:::;;;;
`           :;.                          ` ``:::::::::;;;;;;;;;;;;::,,,,``.,:;;'''';';,,.,,:::::,,. ``.``.::,:::;`  ``.`,....   ```                    ,,;` `;;;:.;;;;:`.::`..`` ``:``;;;,.::.,..;;,:::,
`           ;;`                          ``` :::::::::;;;;;;;:;;;;;:,,,```.::;;'''';'',,.,,,::::,..`:,.``.;;,,:''.```.,.,..``    `                     ,,;` .;;;,.'::;: `;,`.`   `````;::,.;;,.`.;;.,..`
`          `;,                           ``  ,:::;::::;;;;;;;;;;;;;::,,` ``::;;'''';'+:,,,,,:::,,..,':,``.:;,,:'';,,`..,,````    `                     .,:` .;;;.`'.,:. `;``..   `  ``;:::.:;:``,;',.```
`          .:`                           ``  .::::::::;;;;;;;;;;;;;:::`  ``::;;;''';''',,,,,::,,,,.,';;.`.,::::'':,,`,,,`  ``    `                     .,:` .;;:` ;`..` `;` `.`     `.;:::.:;,``,;;.`  `
`         `::                            ``  `::::::;:;;;;;;;;;;;;;;::   ``:;;;;'''';'+:,,,:,:,,,,.:;''.``.,:;:;',::,::.`   `    `                     .,:` `:::` ;` `  `;`       `  ,;::,`.;. `,;;`   .
`         :;,                            `.` `:::;;;;:;;;;;;;;;;;;;;;.  ```:;;;;;'';''''',,:,,,,...,:;;,``,,::.;',,::;,`.`       `                     .,:` `,,:` ;`    `:`       `  .;::, `;`  .;:    .
`         ;;.                           ``.`  ::::::;:;;;;;;;;;''''';` ` ``:;;';;''';''++:,:,,,,...,:;;:..::;,.;',,:;;...`   `` `                      .,:`  ..,  :`    `:`        ` `;::. `;`  .;,    `
`         ;;`                        ` ````   :::::;;;;;;;;;;;''''''.  ` `,;;;';;;'';''+#+:,,,,....::;;;:;;:;,.;':::::.,``  `````      `               .::`  .`,  :      :`        ` `;::. `;`  `;:    `
`         ;;                         ``````   ,::;;;;;;;;;;;;;''';':`   ``:;;;;;;;;;;''++#':,,.....::::;:';;;:,;;;;,,:.,````.````     `.`              .,:`  .`,  ,`     :`         ``;::. `;`  `;:     
`        `;,                         ``   `   .:;;;;;;:;;;;;;;';';;.    `.;;;;;';;;;''''+#+:,,.....::::;;;;::;,;::;,,;,.````,`````    ,,.              ..:`  .`,  ,`     :`         ``;;;. `;`  `;,     
`        .;.                         ``    `   :;;;;;;;;;;;;;;;;;;;`   ``:;;;;;+;;;;;'''+#+:,,.....:;:;;;;;;:;,:::,.,;:` ...,``` `    ::,` ```         `.:   .`,  ,      :`         ``;::` .;.  `:,     
`        :;`   `        ``           `.``` `   :;;;;;::;::;;;;;;;:`   ``.:;;;;;';;;;;''''+#:,,.....:;;;;;';;;;:;;;..:;:``,::,```   ` `::,` `,.         .,:   .`,  .`     :`         `,;:;. .:`  `:,     
`        ::   `.``      ``          ``...`     ::;;;;;;;:;;;;;;;;`   ``.,:;;;;;'':;;;''''+#;,,...,,:;;:;;;;;;::';;``;;:.,:;;,```   ```:;:.`.,,.       `,::   .`,  .`     :`          :::;. .;`  `::   ``
`        ::   `..`     ```      ` `````,:``    ,:;;;;;;;;;;;;;;;` `  ``,::;;;;;;':;;;;''''++;:,,,,,:,:,;;;:;;:,';;..;;:,:;::.`  `````.;;:,.,,,.`   ```.:::   .`,  .`     :.          .::;.`.:`  `::   `.
`        :,   `,,`     ..,     `.`````.,,```   `;;;;;;;;;;;;;;:` `  ``.:::;;;;;;+;:;;;'''''#+'::,,::,,,:;;:;;::'',.,;:::::::.    .,,.:;;::,,..`   `.,.,:::   .`,  ,`     :,`         `:;;,..;`  `:,  `.,
`        ;,   `,:.`   `.,,``   `...``..,,`.``   ;;;;;;;;:;;;;:.  ` ```.,,:;;;;;;+;:;;;;''''+#+'';::,,.,::;:;;::;',,:::::::::.    ,;:.;;;;::,``    `,,,,:,:   .`,` .`     ::.          :;'::.;`  `::  `.:
`        ;,   .::,``  `,:.```` .,,,.`.,,,..```  ;;;;;;;;;;;;;.  `  ``.,:::;;;;;;';::;;;;';'+##+';:::,,.::::::::;',,;:::;:,,:,   `:;;:;;;:::.     `.,,,::,:`  .`,` .`     ::.``        :;';:,:.  `::` `,:
`       `;,`` .::,`````,:``,```,::,..,,,:,,,.,. :;;;;;;;;;;;.   ,````.:::::;;;;;''::;;;;'''+#';::,,:,,.,:::::::;',::,;;;:::.`  `,;;;:;;::;:`   ``..,::::::`  .`,` .`     :;,``        :::;;,;.  `::` `,:
`       .;,`` `:,.```  .,`.,.``,::,...,::,,:,:,`,;;;;';;;;;``   :```.,:::::;;;;;'+::;;;;'''+#;:,,,,,,,,,:::::::;',:::;;;::,`   `:;;;:::::;:.``.....::::::;.  ..:` ``     :;,.         :,,;;:;.` `::```,:
``      ,;,.```,,..``` `:..`..`,::....,::..:,::`.;';;;;;;:``   `:```.,:::::;;;;;;+:::;;;''+++::..,,,,,,,:::::::;':;::;::,,,`  `.;;;;;:::;;:,.`::,..,:::::;,``,,;.`.`    `:;:.  `      :,.;;::,```:;.``::
.....`` ,;,...`,.....```,,``..`,:,``,,,::..:,::`.;'';;';:` `   .,``.,,:::::;;;;;;''::;;;''++;:,..:,,,,,:::::;::'';',,;:.``,` `.:;';;;::;';::,,::,.,,:::::;:,,::;,.,`     :::` ``     `::,;;;;,``.:;...::
:;;::..`:;:,:,.,,.,,,.` ...,,.`.,.`.,,,:..,,,,,`.;''';',` `    :,``.,,:::::;;;;;;'+:::;;''++::,..::,,,,,,;::;::''':,,::````.`.:;;'';;::;;:,:::,.,,:::::;;;:::::::::`   ``,;:```    ```::,;;::,``.;;,`.:,
:::::::,;;;::,.:,..,,.  .`.,..`.......,,.,:::,,`.;';''.`  .    ;,`.,,,::::::;;;;;;+;::;;;'++::...,:,,,,,,::::::'';,.:::.` `..:;;;''';;;;;:.,:,.`,:::;::;;;:::;:::::`   ``::,````   .``;:,;;:::``.';,``,.
:;:::;;;;';;:,,:,``..`  ,` ``` `.`.``....,.,:,.`.;;':`   `.    ;,`.,,,,::::::;;;;;'',::;;'''::,..,:,,,,,,,::;:;;',.,;;:,`  ,,;;;;''';;;:;,.,:,..,:::;::;:;;:::::;::.  ```::,....```.``;:,;;;::``.;;.``:.
;;;;;;;;;';;:::;,`````  ,      `. `````.`...,,``.;',`  ```.    ':`.,,,,::::::;;;;;;+:,::;;''::,..,:,,,::,,,::;;''..:;;;:,``::;;';''';;;;;:,,::,,,:;:;::;:;;::::;;;:.  `..::::::,,``,..;:,;:;,:``.:;,``:`
;;;;;;;;'';;:::;,```    :      `.     `,``..:```.,`  ``````    ;;.,,,,,:::::::;;;;;';,::;;';::,..,:,,,::::,::;:''..;;;;;:.`::;;''''';';;;::::::,::;::;;;:;;;:::;';:`  `.,;;;;;;;:,,,,,;:::,;:,  `,;.  :`
;;;'';;;'';;;;;;,`.`    ,      `,     `,```.:`````  `````.`    ;'.,,,,,,,,:::::;;;;;+:::;;'::,...::,,,::::,::;:;'.,:;;;;::.::;;''''';';;;;:::::::,:,:;;;:;;::;;;';:`  `.,;;;,,;';:,,:,;;::.;;,   .;` `.`
;;;;;;;;;';;;;;::.,.    .      `,     `,```,`````  ``````:`    ;',,,,,,,,,,,:::;;;;;';,:::;;,,...:,,,;::::,;;;:;',::;;;;;:`,:''''';;;;;;';::::::,,,,::;;:;;:;'''';:.```.`:;;``.:;;:,,,;;;:`;',   .;`  .`
;;;;;';;'+;;;;;:;:;,`` `.      `,  ```.:,,,.```   ``````.;`    :',,,,,,,,,,,:::;;;;;;'::::;:,,..,:,,::::::,;;;:;';;:;;;;;:`,;''''';;''';'';:::::,,..::;::;;:;+++';::..,. .;:`  `;;;::,;;;:`,':`  .;`  ` 
;;';;;;;'+;;;;::;;;:,.``,```````,``...:;;;:````` ```````.;`    :';,,,,,,,,,,,,::;;;;;;;::::,,,.,:,,:;:::;::;;::;';';;;:;;:.:;'''''';'''''';:::::,,.,;:::::::;++++';;:,.` .,.   `:;;;::;;;:`.;;.  .;.  ``
;;;''''''';;;;::;;;;;:,,:,......:,.,,,:;;;````````````...'.    ,'',,,,,,,,,,,,:::;;;::;;:,,,:,,:,,,:;::;;;;;;;;;';''';;:::,:;''';'';'''+'';:;:;:::::;:::::::;'++++';:.`` `.`   `::;;;;;;::`.:':` .;`  ``
;;':.,:;+';;;::;;;;;;;:::::::,,,::::::;';```````````...,.'.    ,'':,,,,,,,,,::,::;;;:::::,,,,,,,.,::::::;;;;;;:;';''';;;::,;;''';;;''''+';;:;;;:::;:;;::::::;''++++':``` `.`   `::;;;;;;:;`.,';.`,;`  `.
;;``  ``.:;;;;'';;;;;;;;;;;:::::::::';,`` `````````....,.'.    .'';,,,,,,,,:::,:::;;;;:,::,,,.,..,:;:;;:;;;:;';;';''';'';;:;;';'''';';''';;;;;;:::;;;;::::;;:;''+++':.`` `.`   `:;;;;;;';;,,.'',.,;,``..
:`````````````.,;';;;;;;::::::;;;;;:.``  ```````......,,,'.    `;'':,,,,,,,,,,,,:::;;:,,::,,...,,,:;:';:;;;:;'';''''';'''';;;;;';+''';;'';;;;:::::;;;:;:::;;:;'''##+;..` `.``` `:;;;;:;';;:,,;',.,;;,..`
````````.``` ````.::''''';;;;;;;:..```` ```````.....,,,,,;. `  `;'';,,,,,,,,,..,,:::;:,.,,,,..,::::;;';:;;;;;'';'''+'''''';'';';;+''';'';;;;;;::::;;;:;:;;;;::''++++:``` `,.,.`,;;';::;';;::,;';,:;':,,`
``..........`````````.,...````````````````````.,....,,,,:;. `` `:;'':,,,,,..,,.,,,::::,.,,,,.,;::::::;;:;'';;;';''''+''''''''''''''''''';;:;;;;:::;;:;;:;;;:,:''++'',````,:,:,.:;;;;;:;;;;;::;'+::;':::.
.....,..,,,,,``````````..````````````````````.::,..,,,:,;;` `` `.;''':,,,,..,,,.,,,:::,,,,,,,;;;;';;:;;;;;';''';'''''++''''''''''+''''+'';;;;:;::::::;;:;;:,,:;'++';.``..::::,,;;;;';:;';;;;:;;'';:';::,
..............`````````.;:,,..``````````````.:;:,.,::::,;'```   `';'';::,,,,,..,:,,:,,,..;:;'';;;'';;;';;;;;;'';''''''+''''''''''''''+++'';;:::::::::;;;:;:,::;''++;```,,;::::::;;;'':;';;;;:;;'';:;':::
,....```````````````````,::::,..````````````:;':,,:::::,';```   `';;'';::,,,.,,;:,,,,,:``:++';;''+'''';;'';;:;';''+';''''''''''''''''''++';;:::::::::;;;:;;::::;'+':``,::;;::::::;;'':;';;;::;;;';:;':::
.....```..,:,.``.````````.:;';:..``````..``.;;;:,::;::,:''```   `;;;;;;;::,,.,;;:,,,,.;``.'+''''+++'';'''';;:;';';'';''''''''''''''''''+';;;::::::,::;;;:;;::,:;'';:.,,,:;;;;:::::;:;:;;;;;::;;;'';;';;:
...`.`..,;'''':.``````````.,;;::..``.`....`,;';::::;::,:';.```  `:'';;;:::,,.:';;:,,,., `;.+;'''++++';''''';;;''''';;''''''''''';''''''';;;;::,,::::::;;:;;:::;;'';;,,.,,:;;;,:::::,::;;;;;:,:;;;;;;';;:
..`````..:;;;;;,.``````````.,;;::,..`.,,...;;''::::;::,:+;.```` `.;;;::,,,,,:'';;:::,.. `'.:+'''++++';';;'+'';''';;;;''''';'''';;'''''''';;;;:,,:::;;:;;;;;:::;''+;;,,.,,:;;;:::::,::,;';;;:,::::;';'';:
.```````````````````.`.````.,,;;',...:,,,.,;'''::;;;::::+;,```````';;::,,:,,;;;;;:::,`` `';`,+''+++++;':;''''''';;';;';;;';;''';;'''+++'';;;;:,:,::;;;;;;;':,:;''+'+:,,,,:;:::::::,::,:';;;:,;:,:;'';';:
.```````````....````...`````.,,:;.``,;:,,`:;'''::;;;::::';:```````:;;:::::,;;;;;;::::`` `';,`.;''+++''';;'''''';;;';;'';;;;;''';;''++++'';;;;:,:::;:;;;;;;';::;+++'+;,,,,:;::::::,::,,:';;:,,;:,,;'''';:
.```.....,::,,,,,..``......``..:.``.;;;;..;''''::;;;::::';:.``````,;;:::::;';;;;;:::,``  +''```,'+#++;';;;;''+;;';;;;'';;;;;''';;'''+''';;;;:::::::::::;;;;;::;'+'++;,,,,:;::::::,::,,:';;:,,;:,,:'''';,
.`.,:;'''''';,.....``......``.,,```;'';;..'''''::;;:;:,;+;:.```````;;::::;+';;;;;:::,`  `'+',`````.,:;+'':;''';'';;:;'';;;;;''''''''''';;;;;;::,,,::::::;;';;;;'''++;,,,,;;::::::::,,,:';;:,,;:,,:;'''':
..:''''''''''';,....`..........```:'+'':.,;'''':;;;;:,,:+;;,`.`````;::::;++';;;;;:::,`   ,+';`..``````.,;';''+;;';;:;'';;;';''+''''';';;;;''::,,,,::,:::;;':;;''+'++':,,,;;;:::;;;:,,,:';;:,,;:,,:;''';:
,:'''''''+++''+';:,.`.........````''+'':.:''''';;;;;:::;+'+':,`````';;;;+++';;;;;::,,`   .++',....```````,;''';'';;:;'';;;';''+''''';'';;;';;::,,,:,,:,:;;;:;'+++++++;:::;;;:::::::,,,:;;;:,,;:,,:;;;;::
;''''+++####++++++;:,.......`````:+++'',.;''''';;;;::::;+#+''.`` ``';;;'+++;:;;;;::,,    .'+';....,.```````:++;'';;:;'';;;''''+'''';''';;;;;;::,,,:,,,,,;;::;''';;;;;:,,,,,,,,,,,,...,,,,,,,,,,,.,,,,,,,
;''+++#######+++++'':......``````;++'''.,'''''';;;;;:::;+@+''.`````'':'++++;::;;::,.`    `'++',.,.,:.```````.,;''';;;'';;;'';'''''';'';::;:::::,,,,,,,.,,,,,,,,,,,.,,,..................................
;'+++++++++##+'+++++',....``````,+++'''.:''''';;;;;::;;;#@++;.`````';,.,:'';:;;;:,,`     `:++':.,..:;,...`..```,;;;::;;;;:;;::::::::,,,,,,,,,,..........................................................
'+++''''''+++++++++++;...```````;++++''.;'''''';';;:;;:'#@++,,```.`:,.`````.`....``      `:+++'.,,..::,,.....```.,..,,,,,,,,,,..........................................................................
'+++++++'''++++++++++',......``.'++'+'',;''''''';;;;;;;'##+'.,``.....`````````````````````:'++':.:,,,;;:,,,,,...`.,.,,,,,,,.,,...,,.....................................................................
</pre>
        </p>
        </div>
        <div class="right">
            <h2>
                Examples
            </h2>
            <ul>
                <li>
                    <a href="examples/draw_simplegrid.php" target="_blank">Draw a simple grid</a>
                </li>
                <!--li>
                    <a href="examples/" target="_blank">Draw Text</a>
                </li-->
                <li>
                    <a href="examples/track_mousemove.php" target="_blank">Track Mouse Movement</a>
                </li>
                <!--li>
                    <a href="examples/collisions.php" target="_blank">Collisions</a>
                </li-->
                <!--li>
                    <a href="examples/" target="_blank">Keyboard Movement</a>
                </li-->
                <!--li>
                    <a href="examples/" target="_blank">Draw Shapes</a>
                </li-->
                <li>
                    <a href="examples/sprite_animation.php" target="_blank">Sprite Animation</a>
                </li>
                <li>
                    <a href="examples/multiple_canvases.php" target="_blank">Multiple Canvases</a>
                </li>
                <li>
                    <a href="examples/fibonacci.php" target="_blank">Fibonacci's Golden Ratio</a>
                </li>
                <!--li>
                    <a href="examples/paint.php" target="_blank">Paint Program</a>
                </li-->
            </ul>
        </div>
        <footer>
            <p>This is just another project to see if I could do it. I actually started this several years ago, but like many projects, it just kinda died. I was working with canvas recently and was looking through
            some of my old projects and found this. Version 2.0 represents a complete reworking of the code, pretty much from the ground up. It does incorporate the old code in some areas,
            but 1. It no longer uses paper.js (It's actually all my own code) 2. I have learned quite a lot since I wrote 1.0. As usual, this was never intended for production use of any kind. It was just a hobby.
            But anyone who finds this and would like to use it or participate, feel free to <a href="https://github.com/061375/Wes.Mantooth" target="_blank">fork it</a>.</p>
            <p>My name is <a href="http://www.jeremyheminger.com" target="_blank">Jeremy Heminger</a> and I am a full LAMP stack developer located in Redlands California</p>
        </footer>
    </div>
    <?php echo $grunt; ?> 
</body>
</html>
