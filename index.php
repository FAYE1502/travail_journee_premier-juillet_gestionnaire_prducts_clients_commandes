<?php
$products = [
    0=>['ref'=>'ref1','libele'=>'lib1','prix'=>2000,'quantite'=>12],
    1=>['ref'=>'ref2','libele'=>'lib2','prix'=>500,'quantite'=>2],
];
$productsArchived = [];
$clients = [
    0=>['nomPrenom'=>'Adama Timera','tel'=>'770001233','address'=>'yeumbeul'],
    1=>['nomPrenom'=>'mami Cisse','tel'=>'771001233','address'=>'grand Dakar'],
];
$commandes = [
    0=>['client'=>1,'date'=>'12/06/2026','montant'=>0,'etat'=>'PAYER',
    'product'=>[
        0=>['quantite'=>12,'productIndex'=>0],
        1=>['quantite'=>8,'productIndex'=>1],
    ],
    'paiement'=>'reference1'
    ,

    ],

    1=>['client'=>1,'date'=>'16/06/2026','montant'=>0,'etat'=>'IMPAYER',
    'product'=>[
        0=>['quantite'=>15,'productIndex'=>0],
        1=>['quantite'=>3,'productIndex'=>1],
    ],
    'paiement'=>null
,

    ]
];
$paiements = [
    0=>['date'=>'20/06/2026','reference'=>'reference1',
    'facture'=>['date'=>'14/06/2026','reference'=>1],
    ]
];

function saisie(string $message):string{
    
}
function required(string $value,array &$errors,string $errorRequired):void{
  
}

function unique(array $produits,string $value,array &$errors,string $errorUnique):void{
   
}

function saveProduct(){
    global $products;

}