# Trashsquare w/ CodeIgniter
<hr>
## Controllers
### Admin

Gère le login (`index()`), la page profil(`profil()`), la page paramètres (`param()`) et le logout (`logout()`).

### Site

Gère la partie home (`index()`) et classement (`classement()`).

~~**[TODO] Tout mettre dans un seul controller**~~[Source][1]

<hr>

## Models

### user_model
Commentaires extensifs :).

~~**[TODO] Code pas du tout DRY. Beaucoup de répétitions. A améliorer/modifier/quelque-chose.**~~

**Fait. Grace à MY_Controller j'ai l'objet $the_user disponible partout. :)**

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
Pour l'instant que 2 functions, dont une (`user_nom_p`).

****

## To do & mystères
Je ne sais pas ce c'est mieux d'extend le CI_Model ou de créer un library pour les users. 

**Une library semble être une bonne solution.**
****

Le but serait d'avoir un object **$User**, avec des attributs (nom,prénom,classe,login,password,SU) et des méthodes pour avoir le nom & première lettre du prénom par exemple.

**Fait. Grace à MY_Controller j'ai l'objet $the_user disponible partout. :)**

****

?? Peut-il y avoir des calls à la db depuis une library ?
Sinon il faut quand même avoir un model ? Si oui, cette library User (ou Users, **à voir niveau conventions**) pourait aussi avoir tout ce qui est du login, logout. Et pourquoi pas aussi intégré le score & rank du user.

**Trouvé : La library peut simplement utilisé un model comme normalement.**

****

?? Utilisation d'ORM. Ca vaut la peine?

**Ca à l'air super, mais peut-être pour des plus grandes bdd.**

****

Un gros controller Vs. **plusieurs controllers** = [Source][1]


[EDIT 4/5 : Ajout de notes & solutions]


[1]: http://stackoverflow.com/a/10150332/1117716
