# Trashsquare w/ CodeIgniter
<hr>
## Controllers
### Admin

Gère le login (`index()`), la page profil(`profil()`), la page paramètres (`param()`) et le logout (`logout()`).

### Site

Gère la partie home (`index()`) et classement (`classement()`).

**[TODO] Tout mettre dans un seul controller**
** Soit utiliser les Routes? **

<hr>

## Models

### user_model
Commentaires extensifs :).

**[TODO] Code pas du tout DRY. Beaucoup de répétitions. A améliorer/modifier/quelque-chose.**

### Views

- home_view
- login_view
- param_view
- profil_view
- rank_view

**includes/**

- _prograss-bar
- _sidebar-badges
- _sidebar-info
- header
- template
- template_logged

*Fichier qui commencent avec "**_**" sont des partials.
****
## Helpers
### trashsquare_helper
Pour l'instant que 2 functions, dont une (`user_nom_p`) qui devrait probablement être dans une classe user … ?

****

## To do & mystères
Je ne sais pas ce c'est mieux d'extend le CI_Model ou de créer un library pour les users. 

Le but serait d'avoir un object **$User**, avec des attributs (nom,prénom,classe,login,password,SU) et des méthodes pour avoir le nom & première lettre du prénom par exemple.

?? Peut-il y avoir des calls à la db depuis une library ?
Sinon il faut quand même avoir un model ? Si oui, cette library User (ou Users, **à voir niveau conventions**) pourait aussi avoir tout ce qui est du login, logout. Et pourquoi pas aussi intégré le score & rank du user.

?? Utilisation d'ORM. Ca vaut la peine?

[ à suivre …]

Un gros controller Vs. **plusieurs controllers** = http://stackoverflow.com/a/10150332/1117716
