# *********** movis_test ***************

1 - 1 # Index page : la liste des derniers films tendances de la journée avec un champ de recherche ( pas besoin d'être authentifié ) 

1 - 2 # une fois que vous avez accédé au lien, les informations relatives à l'api sont stockées dans la base de données
        directement ou bien par l'intermédiaire d'un script exécutable (php artisan make:command GetMovies)
        
![mv1](https://github.com/AmineDevF/movis_test/assets/75451861/58dc99fb-9e38-481d-8c74-ec2f4e356776)

#  Accès au backoffice utilisant le package Jetstream.

![mv2](https://github.com/AmineDevF/movis_test/assets/75451861/8b96fcb7-c12b-490b-8af7-82b01379f7a2)


# Maintenant, vous devez ouvrir un navigateur web, taper l'URL donnée et voir le résultat de l'application :

http://movis_test.test/dashboard

![mv3](https://github.com/AmineDevF/movis_test/assets/75451861/70991aef-0efa-4542-ba8d-db89c248060f)

![mv4](https://github.com/AmineDevF/movis_test/assets/75451861/59e46d9e-5de7-4bb1-b48b-dbe96199ccc5)

# Enfin, vous pouvez utiliser cette commande  (php artisan schedule:work) pour mettre à jour vos informations quotidiennement.
