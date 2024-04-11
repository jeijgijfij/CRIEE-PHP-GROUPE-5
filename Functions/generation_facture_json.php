<?php
//génération du tableau
    function generation_facture_json($factureInfos) {
        if (isset($factureInfos)) {
            while ($donnees = $factureInfos->fetch(PDO::FETCH_ASSOC)) {
                $tab = array(
                    "Nom"=> htmlspecialchars($donnees['nom']),
                    "Prénom"=> htmlspecialchars($donnees['prenom']),
                    "Adresse"=> htmlspecialchars($donnees['adresse']),
                    "Ville"=> htmlspecialchars($donnees['ville']),
                    "idBateau"=> htmlspecialchars($donnees['idBateau']),
                    "Nom"=> htmlspecialchars($donnees['nom']),
                    "datePeche"=> htmlspecialchars($donnees['datePeche']),
                    "montantHT"=> htmlspecialchars($donnees['montantHT']),
                    "dateFacture"=> htmlspecialchars($donnees['dateFacture']),
                );
                $IdFacture=htmlspecialchars($donnees['idFac']);
            } $factureInfos->closeCursor();
        } else {
            echo "facture infos vide\n";
        }

        if (isset($tab)) {
            $FactureJson=json_encode($tab);
            $FilePath=".\FacturesJson\FactureJson_$IdFacture.json";
            fopen($FilePath, 'c+b');
            file_put_contents($FilePath, $FactureJson);
            return $FilePath;
        } else {
            echo "Erreur lors de la génération de la facture";
        }
    }
?>