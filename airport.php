<?php

function defilementTexte($str)
{   //INITIALISATION DES VARIABLES


    //timer validant/invalidant la condition while
    $timer=false;

    //longueur de la chaine
    $len=strlen($str);

    //compteur de sleep
    $sleepcount=0;

    //variable de condition if à l'intérieur de la boucle qui permet de passer ou non $timer à true
    $maxexecution=$len*2;

    //PROMPT de l'utilisateur pour récupérer la longueur de l'affichage souhaitée
    do
    {
        system('clear');
        $lenview=(int)readline('Choisir une longueur d\'affichage comprise entre 2 et '."$len:");
    }while($lenview>$len||$lenview<2);
    


    //récupère les trente premiers caractères de la chaine
    $begin=substr($str,0,$lenview-1);

    //condition while d'affichage de la chaine de caractères
    $end=substr($str,$lenview-1,$len);



    //condition de sortie au cas où la chaine est inférieure à 30
    if($len<30)
    {
        return;
    }


    // boucle while servant à l'affichage des chaines de caractères défilantes
    while($timer === false)
    {
        if($sleepcount==$maxexecution)
        {
            //timer reçoit true si le compteur est égal à deux fois la taille de la chaine (modifiable au début de la fonction plus haut -- partie initialisation des variables)
            $timer=true;
        }
        elseif($sleepcount==0)
        {
            foreach($arr as $value)
            {
                //on affiche le caractère de la chaine
                echo $value;
                //intervalle d'une demi-seconde
                usleep(500000);
            }

            system('clear');
            
            //echo "$begin\n";

            //incrémentation du compteur ...
            $sleepcount++;
        }
        else
        {   // ... sinon on prépare la prochaine chaine de caractères ...

            // on récupère les caractères de fin de chaine ...
            $charrightend=substr($begin,strlen($begin)-1,strlen($begin));
            $charleftend=substr($end,strlen($end)-1,strlen($end));

            //pour les insérer chacun au début de la chaine adverse ...
            $end=$charrightend.$end;
            $begin=$charleftend.$begin;

            //on supprime les caractères ajoutés en début de chaine ...
            $begin=substr($begin,0,-1);
            $end=substr($end,0,-1);

            $arr=str_split($begin);

            foreach($arr as $value)
            {
                //on affiche le caractère de la chaine
                echo $value;
                //intervalle d'une demi-seconde
                usleep(500000);
            }

            system('clear');
            //on affiche la chaine ...
            //echo "\n";

            //incrémentation du compteur
            $sleepcount++;
        }

        //$timer=true;
        //print "$begin.$end";
        
    }

}

defilementTexte("Le but de notre vie est d’être heureux.");