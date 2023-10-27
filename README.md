ReadMe - Annuaire NWS

lien de la page d'acceuil en cas de soucis : http://localhost/devoir1annee2/framework-php-vanilla/?page=accueil

Page d'Accueil

En arrivant sur la page d'accueil, vous trouverez une liste de 3 liens :

Accueil : Cette option vous ramène à la page d'accueil, utile si vous vous trouvez sur d'autres pages. 
Inscription : Cliquez ici pour vous inscrire en fournissant votre nom, prénom, passions, et en spécifiant votre niveau de connaissance de l'école (connaît, entendu, ne connaît pas). 
Liste : Cette option vous redirige vers la page qui affiche la liste complète des inscrits.

Page d'Inscription

Sur la page d'inscription, vous pouvez fournir vos informations personnelles comme : 
Nom : Votre nom. 
Prénom : Votre prénom. 
Passions : Vous pouvez indiquer vos centres d'intérêt ou passions. 
Statut : Choisissez parmi trois options pour votre niveau de connaissance de l'école : "Know" (connaît), "Heard" (a entendu), ou "Away" (ne connaît pas du tout). 
Une fois que vous avez rempli ces informations, cliquez sur le bouton d'inscription pour ajouter vos données à la liste des inscrits.

Page de Liste

La page de liste affiche la liste complète des inscrits avec des options de filtrage et de recherche :

Filtrage par Statut :
Vous pouvez filtrer les inscrits en fonction de leur statut en sélectionnant l'une des options : "Know," "Heard," ou "Away." Barre de Recherche : 
Utilisez la barre de recherche pour trouver des inscrits en fonction de leur nom, prénom ou passions. Chaque ligne du tableau de la liste comprend également une colonne "Action" avec deux liens :
Supprimer : Cliquez sur "Supprimer" pour ouvrir une boîte de dialogue de confirmation qui vous demande si vous êtes sûr de vouloir supprimer l'inscription. 
Modifier : Le lien "Modifier" vous permet de mettre à jour les informations de l'inscription, y compris le nom, le prénom et les passions.

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Cahier des charges pour le projet "Annuaire des Nouveaux Étudiants" :

Introduction
Le projet vise à répondre aux besoins de l'école NWS en créant un annuaire centralisé pour gérer les informations des nouveaux étudiants qui souhaitent s'inscrire. L'objectif principal est de simplifier la gestion des inscriptions, de centraliser les données des étudiants et de faciliter l'accès à ces informations pour le personnel de l'école.

Briques fonctionnelles obligatoires
2.1. Sauvegarde des données en Base de données

Utilisation d'une base de données (MySQL ou MariaDB) pour stocker les informations des étudiants. Configuration de la connexion à la base de données via un fichier JSON.

2.2. Ajout d'un contact

Mise en place d'une fonction PHP pour ajouter un nouveau contact dans la base de données.

2.3. Modification d'un contact

Implémentation d'une fonction PHP pour mettre à jour les informations d'un contact existant dans la base de données.

2.4. Suppression d'un contact

Développement d'une fonction PHP permettant de supprimer un contact de la base de données.

2.5. Recherche d'un contact

Création d'une fonction PHP pour récupérer un contact spécifique à partir de la base de données.

2.6. Trier les contacts

Mise en place d'une fonction PHP permettant de trier les contacts en fonction d'un critère spécifié.

2.7. Filtrer les contacts

Développement d'une fonction PHP permettant de filtrer les contacts en fonction d'un critère spécifié.

Pages obligatoires
3.1. Lister les contacts

Création d'une page web pour afficher la liste de tous les contacts. Permettre le tri des contacts en fonction de critères spécifiés (par exemple, nom, prénom, date d'inscription). Inclure des boutons pour la modification et la suppression de chaque contact.

3.2. Ajouter un contact

Mise en place d'une page web avec un formulaire permettant d'ajouter un nouveau contact à la base de données.

3.3. Modifier un contact

Création d'une page web avec un formulaire permettant de modifier les informations d'un contact existant.

Outils & Stack
4.1. Bonnes pratiques imposées

Utilisation de classes pour gérer les modèles. Les fonctions doivent prendre des objets en paramètres et renvoyer des objets.

4.2. Fichier de configuration JSON

Configuration de la connexion à la base de données via un fichier JSON.

4.3. Outils imposés

Langage PHP. HTML / CSS pour le développement des pages web. JavaScript (optionnel).

4.4. Outils interdits

L'utilisation d'ORMs tiers non développés par l'équipe est interdite.

Rendu
Le projet doit être rendu sur GitHub en mode public. Utilisation efficace de Git, y compris la création de branches, les commits fréquents et un fichier README.md explicatif.
