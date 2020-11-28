<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // DB::statement('DEFAULT CHARACTER SET utf8;');
        \App\Gender::truncate();
        factory(\App\Gender::class, 1)->create(['name' => 'Masculino']);
        factory(\App\Gender::class, 1)->create(['name' => 'Femenino']);
        factory(\App\Gender::class, 1)->create(['name' => 'No decir']);
        // usuarios con roles asignados
        $this->call(UserSeeder::class);

        // usuarios sin rol
        factory(\App\User::class, 10)->create();


        app()->setLocale('es');

        // crear categorias de los clout
         #region
         factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Actor'
                ]
            );

            $category1=\App\CloudCategory::find(1);
            $category1->setTranslation('name','en','Actor');
        $category1->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Arquitectura'
            ]
        );

        $category2=\App\CloudCategory::find(2);
        $category2->setTranslation('name','en','Architectural Designer');
        $category2->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Artista'
            ]
        );

        $category3=\App\CloudCategory::find(3);
        $category3->setTranslation('name','en','Artist');
        $category3->save();



        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Atleta'
            ]
        );

        $category4=\App\CloudCategory::find(4);
        $category4->setTranslation('name','en','Athlete');
        $category4->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Autor'
            ]
        );

        $category5=\App\CloudCategory::find(5);
        $category5->setTranslation('name','en','Author');
        $category5->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Productor de Audio'
            ]
        );

        $category6=\App\CloudCategory::find(6);
        $category6->setTranslation('name','en','Audio Producer');
        $category6->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Baile'
            ]
        );

        $category7=\App\CloudCategory::find(7);
        $category7->setTranslation('name','en','Dancer');
        $category7->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Blogger'
            ]
        );

        $category8=\App\CloudCategory::find(8);
        $category8->setTranslation('name','en','Blogger');
        $category8->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Cantante'
            ]
        );

        $category9=\App\CloudCategory::find(9);
        $category9->setTranslation('name','en','Singer');
        $category9->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Chef'
            ]
        );

        $category10=\App\CloudCategory::find(10);
        $category10->setTranslation('name','en','Chef');
        $category10->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Coach'
            ]
        );

        $category11=\App\CloudCategory::find(11);
        $category11->setTranslation('name','en','Coach');
        $category11->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Comediante'
            ]
        );

        $category12=\App\CloudCategory::find(12);
        $category12->setTranslation('name','en','Comedian');
        $category12->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Diseño Interiores'
            ]
        );

        $category13=\App\CloudCategory::find(13);
        $category13->setTranslation('name','en','Interior Designer');
        $category13->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Diseño Gráfico'
            ]
        );

         $category14=\App\CloudCategory::find(14);
         $category14->setTranslation('name','en','Graphic Designer');
         $category14->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Banda'
            ]
        );

        $category15=\App\CloudCategory::find(15);
        $category15->setTranslation('name','en','Musician/Band');
        $category15->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Diseño Moda'
            ]
        );

        $category16=\App\CloudCategory::find(16);
        $category16->setTranslation('name','en','Fashion Model');
        $category16->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Comediante'
            ]
        );

        $category17=\App\CloudCategory::find(17);
        $category17->setTranslation('name','en','Comedian');
        $category17->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'DJ'
            ]
        );

        $category18=\App\CloudCategory::find(18);
        $category18->setTranslation('name','en','DJ');
        $category18->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Emprendedor'
            ]
        );

        $category19=\App\CloudCategory::find(19);
        $category19->setTranslation('name','en','Entrepreneur');
        $category19->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Escritor'
            ]
        );

        $category20=\App\CloudCategory::find(20);
        $category20->setTranslation('name','en','Writer');
        $category20->save();


        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Fashion'
            ]
        );

        $category21=\App\CloudCategory::find(21);
        $category21->setTranslation('name','en','Fashion Model');
        $category21->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Fitness'
            ]
        );

        $category22=\App\CloudCategory::find(22);
        $category22->setTranslation('name','en','Fitness');
        $category22->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Fotografía'
            ]
        );

        $category23=\App\CloudCategory::find(23);
        $category23->setTranslation('name','en','Photographer');
        $category23->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Gaming'
            ]
        );

        $category24=\App\CloudCategory::find(24);
        $category24->setTranslation('name','en','Gaming');
        $category24->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Graffitti'
            ]
        );

        $category25=\App\CloudCategory::find(25);
        $category25->setTranslation('name','en','Graffitti artist');
        $category25->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Humor'
            ]
        );

        $category26=\App\CloudCategory::find(26);
        $category26->setTranslation('name','en','Humorist');
        $category26->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Periodista'
            ]
        );

        $category27=\App\CloudCategory::find(27);
        $category27->setTranslation('name','en','Journalist');
        $category27->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Músico'
            ]
        );

        $category28=\App\CloudCategory::find(28);
        $category28->setTranslation('name','en','Musician');
        $category28->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Tour Manager'
            ]
        );

        $category29=\App\CloudCategory::find(29);
        $category29->setTranslation('name','en','Tour Manager');
        $category29->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Productor de Audio'
            ]
        );

        $category30=\App\CloudCategory::find(30);
        $category30->setTranslation('name','en','Audio Producer');
        $category30->save();

        factory(\App\CloudCategory::class)->create(
            [
                "name"=>'Productor de video'
            ]
        );

        $category31=\App\CloudCategory::find(30);
        $category31->setTranslation('name','en','Video Producer');
        $category31->save();

        #endregion


        // ingresar generos musicales

        #region
        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Afro'
            ]
        );

        $music1=\App\MusicalGenre::find(1);
        $music1->setTranslation('name','en','Afro');
        $music1->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Caribe'
            ]
        );

        $music2=\App\MusicalGenre::find(2);
        $music2->setTranslation('name','en','Caribbean');
        $music2->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Cumbia'
            ]
        );

        $music3=\App\MusicalGenre::find(3);
        $music3->setTranslation('name','en','Cumbia');
        $music3->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Cristiana'
            ]
        );

        $music4=\App\MusicalGenre::find(4);
        $music4->setTranslation('name','en','Christian');
        $music4->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Dance/Electrónica'
            ]
        );

        $music5=\App\MusicalGenre::find(5);
        $music5->setTranslation('name','en','Dance/Electronic');
        $music5->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Hip Hop'
            ]
        );

        $music6=\App\MusicalGenre::find(6);
        $music6->setTranslation('name','en','Hip Hop');
        $music6->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'K-pop'
            ]
        );

        $music7=\App\MusicalGenre::find(7);
        $music7->setTranslation('name','en','K-pop');
        $music7->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Pop'
            ]
        );

        $music8=\App\MusicalGenre::find(8);
        $music8->setTranslation('name','en','Pop');
        $music8->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Popular Colombiano'
            ]
        );

        $music9=\App\MusicalGenre::find(9);
        $music9->setTranslation('name','en','Regional Colombian');
        $music9->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Punk'
            ]
        );

        $music10=\App\MusicalGenre::find(10);
        $music10->setTranslation('name','en','Punk');
        $music10->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'R&B'
            ]
        );

        $music11=\App\MusicalGenre::find(11);
        $music11->setTranslation('name','en','R&B');
        $music11->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Regional Mexicano'
            ]
        );

        $music12=\App\MusicalGenre::find(12);
        $music12->setTranslation('name','en','Regional Mexican');
        $music12->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Rock en Español'
            ]
        );

        $music13=\App\MusicalGenre::find(13);
        $music13->setTranslation('name','en','Rock in spanish');
        $music13->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Rock en Inglés'
            ]
        );

        $music14=\App\MusicalGenre::find(14);
        $music14->setTranslation('name','en','Rock in English');
        $music14->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Urbano'
            ]
        );

        $music15=\App\MusicalGenre::find(15);
        $music15->setTranslation('name','en','Urban');
        $music15->save();

        factory(\App\MusicalGenre::class)->create(
            [
                "name"=>'Urbano Pop'
            ]
        );

        $music16=\App\MusicalGenre::find(16);
        $music16->setTranslation('name','en','Urban Pop');
        $music16->save();

        #endregion

        // tags

        #region
        factory(\App\Tag::class)->create(
            [
                "name"=>'Aire libre'
            ]
        );

        $tag1=\App\Tag::find(1);
        $tag1->setTranslation('name','en','Outdoor activities');
        $tag1->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Actuación'
            ]
        );

        $tag2=\App\Tag::find(2);
        $tag2->setTranslation('name','en','Acting');
        $tag2->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Arte'
            ]
        );

        $tag3=\App\Tag::find(3);
        $tag3->setTranslation('name','en','Art');
        $tag3->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Anime'
            ]
        );

        $tag4=\App\Tag::find(4);
        $tag4->setTranslation('name','en','Anime');
        $tag4->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Baile'
            ]
        );

        $tag5=\App\Tag::find(5);
        $tag5->setTranslation('name','en','Dance');
        $tag5->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Coaching'
            ]
        );

        $tag6=\App\Tag::find(6);
        $tag6->setTranslation('name','en','Coaching');
        $tag6->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Cocina'

            ]
        );

        $tag7=\App\Tag::find(7);
        $tag7->setTranslation('name','en','Cooking');
        $tag7->save();



        factory(\App\Tag::class)->create(
            [
                "name"=>'Comedia'

            ]
        );

        $tag9=\App\Tag::find(8);
        $tag9->setTranslation('name','en','Comedy');
        $tag9->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Comedia en vivo'

            ]
        );

        $tag10=\App\Tag::find(9);
        $tag10->setTranslation('name','en','Live Comedy');
        $tag10->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Conciertos'

            ]
        );

        $tag11=\App\Tag::find(10);
        $tag11->setTranslation('name','en','Concerts');
        $tag11->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Deporte'

            ]
        );

        $tag12=\App\Tag::find(11);
        $tag12->setTranslation('name','en','Sport');
        $tag12->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Diseño'

            ]
        );

        $tag13=\App\Tag::find(12);
        $tag13->setTranslation('name','en','Design');
        $tag13->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Educación'

            ]
        );

        $tag14=\App\Tag::find(13);
        $tag14->setTranslation('name','en','Education');
        $tag14->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Entrenador'

            ]
        );

        $tag15=\App\Tag::find(14);
        $tag15->setTranslation('name','en','Coaching');
        $tag15->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Fitness'

            ]
        );

        $tag16=\App\Tag::find(15);
        $tag16->setTranslation('name','en','Fitness');
        $tag16->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Fotografía'

            ]
        );

        $tag17=\App\Tag::find(16);
        $tag17->setTranslation('name','en','Photography');
        $tag17->save();




        factory(\App\Tag::class)->create(
            [
                "name"=>'Gaming'

            ]
        );

        $tag18=\App\Tag::find(17);
        $tag18->setTranslation('name','en','Gaming');
        $tag18->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Geek'

            ]
        );

        $tag19=\App\Tag::find(18);
        $tag19->setTranslation('name','en','Geek');
        $tag19->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Graffiti'

            ]
        );

        $tag20=\App\Tag::find(19);
        $tag20->setTranslation('name','en','Graffiti');
        $tag20->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Humor'

            ]
        );

        $tag21=\App\Tag::find(20);
        $tag21->setTranslation('name','en','Humor');
        $tag21->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Ilustración'

            ]
        );

        $tag22=\App\Tag::find(21);
        $tag22->setTranslation('name','en','Illustration');
        $tag22->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Moda'

            ]
        );

        $tag23=\App\Tag::find(22);
        $tag23->setTranslation('name','en','Fashion');
        $tag23->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Música'

            ]
        );

        $tag24=\App\Tag::find(23);
        $tag24->setTranslation('name','en','Music');
        $tag24->save();


        factory(\App\Tag::class)->create(
            [
                "name"=>'Música en vivo'

            ]
        );

        $tag25=\App\Tag::find(24);
        $tag25->setTranslation('name','en','Live Music');
        $tag25->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Naturaleza'

            ]
        );

        $tag26=\App\Tag::find(25);
        $tag26->setTranslation('name','en','Nature');
        $tag26->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Películas'

            ]
        );

        $tag27=\App\Tag::find(26);
        $tag27->setTranslation('name','en','Movies');
        $tag27->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Skate'

            ]
        );

        $tag28=\App\Tag::find(27);
        $tag28->setTranslation('name','en','Skateboard');
        $tag28->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Tecnología'

            ]
        );

        $tag29=\App\Tag::find(28);
        $tag29->setTranslation('name','en','Technology');
        $tag29->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Viajes'

            ]
        );

        $tag30=\App\Tag::find(29);
        $tag30->setTranslation('name','en','Traveling');
        $tag30->save();

        factory(\App\Tag::class)->create(
            [
                "name"=>'Weed'

            ]
        );

        $tag31=\App\Tag::find(30);
        $tag31->setTranslation('name','en','Weed');
        $tag31->save();

        #endregion




        // categorias de los proyecto

        #region
        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Aire libre'
            ]
        );

        $ProjectCategory1=\App\ProjectCategory::find(1);
        $ProjectCategory1->setTranslation('name','en','Outdoor activities');
        $ProjectCategory1->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Actuación'
            ]
        );

        $ProjectCategory2=\App\ProjectCategory::find(2);
        $ProjectCategory2->setTranslation('name','en','Acting');
        $ProjectCategory2->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Arte'
            ]
        );

        $ProjectCategory3=\App\ProjectCategory::find(3);
        $ProjectCategory3->setTranslation('name','en','Art');
        $ProjectCategory3->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Anime'
            ]
        );

        $ProjectCategory4=\App\ProjectCategory::find(4);
        $ProjectCategory4->setTranslation('name','en','Anime');
        $ProjectCategory4->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Baile'
            ]
        );

        $ProjectCategory5=\App\ProjectCategory::find(5);
        $ProjectCategory5->setTranslation('name','en','Dance');
        $ProjectCategory5->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Coaching'
            ]
        );

        $ProjectCategory6=\App\ProjectCategory::find(6);
        $ProjectCategory6->setTranslation('name','en','Coaching');
        $ProjectCategory6->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Cocina'

            ]
        );

        $ProjectCategory7=\App\ProjectCategory::find(7);
        $ProjectCategory7->setTranslation('name','en','Cooking');
        $ProjectCategory7->save();



        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Comedia'

            ]
        );

        $ProjectCategory9=\App\ProjectCategory::find(8);
        $ProjectCategory9->setTranslation('name','en','Comedy');
        $ProjectCategory9->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Comedia en vivo'

            ]
        );

        $ProjectCategory10=\App\ProjectCategory::find(9);
        $ProjectCategory10->setTranslation('name','en','Live Comedy');
        $ProjectCategory10->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Conciertos'

            ]
        );

        $ProjectCategory11=\App\ProjectCategory::find(10);
        $ProjectCategory11->setTranslation('name','en','Concerts');
        $ProjectCategory11->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Deporte'

            ]
        );

        $ProjectCategory12=\App\ProjectCategory::find(11);
        $ProjectCategory12->setTranslation('name','en','Sport');
        $ProjectCategory12->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Diseño'

            ]
        );

        $ProjectCategory13=\App\ProjectCategory::find(12);
        $ProjectCategory13->setTranslation('name','en','Design');
        $ProjectCategory13->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Educación'

            ]
        );

        $ProjectCategory14=\App\ProjectCategory::find(13);
        $ProjectCategory14->setTranslation('name','en','Education');
        $ProjectCategory14->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Entrenador'

            ]
        );

        $ProjectCategory15=\App\ProjectCategory::find(14);
        $ProjectCategory15->setTranslation('name','en','Coaching');
        $ProjectCategory15->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Fitness'

            ]
        );

        $ProjectCategory16=\App\ProjectCategory::find(15);
        $ProjectCategory16->setTranslation('name','en','Fitness');
        $ProjectCategory16->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Fotografía'

            ]
        );

        $ProjectCategory17=\App\ProjectCategory::find(16);
        $ProjectCategory17->setTranslation('name','en','Photography');
        $ProjectCategory17->save();




        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Gaming'

            ]
        );

        $ProjectCategory18=\App\ProjectCategory::find(17);
        $ProjectCategory18->setTranslation('name','en','Gaming');
        $ProjectCategory18->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Geek'

            ]
        );

        $ProjectCategory19=\App\ProjectCategory::find(18);
        $ProjectCategory19->setTranslation('name','en','Geek');
        $ProjectCategory19->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Graffiti'

            ]
        );

        $ProjectCategory20=\App\ProjectCategory::find(19);
        $ProjectCategory20->setTranslation('name','en','Graffiti');
        $ProjectCategory20->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Humor'

            ]
        );

        $ProjectCategory21=\App\ProjectCategory::find(20);
        $ProjectCategory21->setTranslation('name','en','Humor');
        $ProjectCategory21->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Ilustración'

            ]
        );

        $ProjectCategory22=\App\ProjectCategory::find(21);
        $ProjectCategory22->setTranslation('name','en','Illustration');
        $ProjectCategory22->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Moda'

            ]
        );

        $ProjectCategory23=\App\ProjectCategory::find(22);
        $ProjectCategory23->setTranslation('name','en','Fashion');
        $ProjectCategory23->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Música'

            ]
        );

        $ProjectCategory24=\App\ProjectCategory::find(23);
        $ProjectCategory24->setTranslation('name','en','Music');
        $ProjectCategory24->save();


        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Música en vivo'

            ]
        );

        $ProjectCategory25=\App\ProjectCategory::find(24);
        $ProjectCategory25->setTranslation('name','en','Live Music');
        $ProjectCategory25->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Naturaleza'

            ]
        );

        $ProjectCategory26=\App\ProjectCategory::find(25);
        $ProjectCategory26->setTranslation('name','en','Nature');
        $ProjectCategory26->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Películas'

            ]
        );

        $ProjectCategory27=\App\ProjectCategory::find(26);
        $ProjectCategory27->setTranslation('name','en','Movies');
        $ProjectCategory27->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Skate'

            ]
        );

        $ProjectCategory28=\App\ProjectCategory::find(27);
        $ProjectCategory28->setTranslation('name','en','Skateboard');
        $ProjectCategory28->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Tecnología'

            ]
        );

        $ProjectCategory29=\App\ProjectCategory::find(28);
        $ProjectCategory29->setTranslation('name','en','Technology');
        $ProjectCategory29->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Viajes'

            ]
        );

        $ProjectCategory30=\App\ProjectCategory::find(29);
        $ProjectCategory30->setTranslation('name','en','Traveling');
        $ProjectCategory30->save();

        factory(\App\ProjectCategory::class)->create(
            [
                "name"=>'Weed'

            ]
        );

        $ProjectCategory31=\App\ProjectCategory::find(30);
        $ProjectCategory31->setTranslation('name','en','Weed');
        $ProjectCategory31->save();

        #endregion


        // agregar clouts

       factory(\App\Clout::class, 10)->create();


       //crear projectos

       factory(\App\Project::class, 10)->create();





        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
