# INF3190 TRAVAIL DE SESSION

## EQUIPE

### Membres

**Etienne Comtois** : COME17029800  
**Louis Roy Therrien** : ROYL20059103  
**Alexandre Laurin** : LAUA23108205  
**Mathieu Charbonneau** : CHAM25029407

### Partage de Connaissance

Le `GitHub` suivant sera utilisé afin de centraliser le travail : [GitHub INF3190 TS](https://github.com/alexlaurincoding/INF3190_Travail_de_session.git)

Le `OneNote` suivant sera utilisé comme planche à dessin commune et afin de partages des documents de coordinations [OneNote INF3190 TS](https://uqam-my.sharepoint.com/:o:/g/personal/jb591912_ens_uqam_ca/Ei4SeovgjfJApBzsdJSmaCsBOT2XgswlFoS4ARMlf6SUSQ?e=PtQ1UL)

Les communications s'effectuerons sur le serveur `Discord` commun.

### Rencontres

- Une à deux rencontres de coordination par semaine (à déterminer combien et quand) seront de mise afin de diviser et de faire un suivi du travail.
  - Lundi 20h
  - Vendredi 17h
- Le travail se fera en sous équipes ou individuellement afin d'accélérer le travail.
- Les tâches atomiques seront attribués afin d'être réalisé avant la prochaine rencontre de coordination.

## ARBORESCENCE

```bash
.
├── README.md
├── img # Dossier des images de profils
│   ├── bart_mini.jpg
│   ├── cartman_mini.jpg
│   ├── homer_mini.jpg
│   ├── liane_cartman_mini.jpg
│   ├── lisa_mini.jpg
│   ├── profil.png
│   ├── randy_mini.jpg
│   └── stan_mini.jpg
├── jQuery
│   └── jquery-3.6.0.js
├── javascript # Code Javascript
│   ├── bootstrap.bundle.min.js
│   ├── dossier_enfant.json
│   ├── dossier_parent.json
│   ├── inscriptions.json
│   ├── javaScript.js
│   └── testTableau.js
├── style # Code css
│   ├── bootstrap.min.css
│   └── main.css
└── vues # Autres Pages
    ├── contact.html # Page d'information sur le client
    ├── footer.html # Pied de page inséré sur toutes les pages
    ├── gestion.html # Page d'administration des programmes
    ├── horaire.html
    ├── index.html # Page d'accueil
    ├── infos_profil.html
    ├── inscription.html
    ├── inscription_admin.html
    ├── inscription_parent.html # Page d'inscription
    ├── navbar.html # Barre de navigation inséré sur toutes les pages
    └── programmes.html # Présentation des programmes
```

## STRATÉGIE 

### TECHNOLOGIES

- Afin de simplifier la maintenance et la cohérence du site, [`Bootstrap 5`](https://getbootstrap.com/docs/5.0/getting-started/introduction/) est utilisé par toutes les pages.
- Des style supplémentaires permettent d'unifier le style du site. 
Voir fichier [`/style/main.css`](./style/main.css).
- Les données sont stockées au format `.json`. Les méthodes de ce prototype permettent la lecture seulement.
  - L'accès aux données se fait par appel [`AJAX`, en `jQuery`](https://api.jquery.com/jquery.ajax/).
- La simulation de paiement se fait à l'aide de `PayPal Sandbox`.
  -  courriel : `sb-ybcnk6512123@personal.example.com`
  -  mot de passe : `lesnerds`
- Le `javascript` est utilisé pour augmenter l'interactivité des éléments du site.
  -  Le fichier [`/javascript/javaScript.js`](./javascript/javaScript.js)  réduit la répétition de code et augmente ainsi la maintenabilité.
  - Le fichier [`/javascript/tableau_admin.js`](./javascript/tableau_admin.js) génère, à partir des données, un [tableau interactif `datatable`](https://datatables.net/) 

### EXPÉRIENCE UTILISATEUR

