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
    return readline ($message);
}
function required(string $value,array &$errors,string $errorRequired):void{
   if(empty($value)){
        $errors['required'] = $errorRequired;
   }
}

function unique(array $produits,string $value,array &$errors,string $errorUnique):void{
    foreach ($produits as $produit) {
        if ($produit["libele"] === $value) {
            $errors['unique'] = $errorUnique;
        }
    }
}

function showError(array $errors){
    foreach($errors as $errorField){
        foreach($errorField as $error)
            echo "$error \n";
        }
}

function saveProduct(){
    global $products;

    function saveProduct(){
    global $products;
    do {
        $errors = [];
        $libelle = saisie("Entrez le libellé: ");
        required($libelle,$errors,"Le libellé est obligatoire");
        unique($products,$libelle,$errors,"Ce libellé existe déjà");
        foreach($errors as $error){
            echo "$error \n";
        }
    } while (count($errors)!= 0);
    $newProduct=[
        "ref"=>genererReference($products),
        "libele" => $libelle,
    ];
    $products[] = $newProduct;
    
}


}

function genererReference( array $products):string{
    $taille=count($products)+1;
     if($taille<=9){
        $ref="REF00";
    }elseif ($taille<=99){
        $ref="REF0";
    }else{
        $ref="REF";
    }
    return $ref.$taille;
}

function getProductByLibele (array $products, string $value): int{
    foreach ($products as $index => $product) {
                    if ($product["libele"] == $value){
                    return $index;
                }
            }
            return -1 ;
}

 function deleteProduit (int $index, array &$products): array {
            return array_splice($products, $index, 1)[0];
            
    }

    function listerProduits(array $products) : void {
    foreach ($products as $product){
         echo $product["libele"]."\n";
    }
}

function archiverProduit (): void {
    global $productsArchived , $products;
    
    $value = saisie ("Veuillez renseigner le libellé \n");
    $indexArchived = getProductByLibele($products, $value);
        if ($indexArchived !== -1){
            $productArchived = deleteProduit($indexArchived, $products);
            $productsArchived[] = $productArchived;
            
        } else {
            echo "Produit non trouvé";
        }
        
}
archiverProduit ();
listerProduits($productsArchived);

