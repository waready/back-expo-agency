<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombres'  => 'Student Primary',
            'apellidos'  => 'Secondary',
            'dni'  => '987654321',
            'email' => 'student@mail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 1,
            'password' =>bcrypt('987654321'),

        ])->assignRole('Administrador');
////////////////////////////////////////////////////////////
        /*1*/
        User::create([
            'nombres'  => 'HUGO DIDI',
            'apellidos'  => 'APAZA QUISPE',
            'dni'  => '02364768',
            'email' => 'huapquis@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '951967602',
            'cargo' => 'DIRECTOR REGIONAL DE EDUCACIÓN',
            'condicion' => 'ENCARGADO',
            'password' =>bcrypt('02364768'),

        ])->assignRole('Especialista_drep');
        /*2*/
        User::create([
            'nombres'  => 'MARCO ANTONIO',
            'apellidos'  => 'VASQUEZ BARRIOS',
            'dni'  => '02431339',
            'email' => 'mvasquezb@drepuno.edu.pe',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '978652983',
            'cargo' => 'DIRECTOR DE GESTIÓN PEDAGÓGICA',
            'condicion' => 'DESIGNACIÓN ESPECIAL',
            'password' =>bcrypt('02431339'),

        ])->assignRole('Especialista_drep');
        /*3*/
        User::create([
            'nombres'  => 'ROXANA ZOILA',
            'apellidos'  => 'ARROYO APAZA',
            'dni'  => '01322189',
            'email' => 'rarroyoapaza@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '951464498',
            'cargo' => 'ESPECIALISTA EN EDUCACIÓN - INICIAL',
            'condicion' => 'DESIGNADA',
            'password' =>bcrypt('01322189'),

        ])->assignRole('Especialista_drep');
        /*4*/
        User::create([
            'nombres'  => 'FÁTIMA ALEXANDRA',
            'apellidos'  => 'RAMOS COILA',
            'dni'  => '40125108',
            'email' => 'alecyta09@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '941800091',
            'cargo' => 'ESPECIALISTA DE EDUCACIÓN - INICIAL',
            'condicion' => 'DESIGNADA',
            'password' =>bcrypt('40125108'),

        ])->assignRole('Especialista_drep');
        /*5*/
        User::create([
            'nombres'  => 'DAVID HERMENEGILDO',
            'apellidos'  => 'PARICAHUA CONDORI',
            'dni'  => '02422889',
            'email' => 'hermeneg59@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '982004685',
            'cargo' => 'ESPECIALISTA DE EDUCACIÓN - PRIMARIA',
            'condicion' => 'DESIGNADO',
            'password' =>bcrypt('02422889'),

        ])->assignRole('Especialista_drep');
        /*6*/
        User::create([
            'nombres'  => 'JESUS NAPOLEON',
            'apellidos'  => 'HUANCA MAMANI',
            'dni'  => '43139017',
            'email' => 'napoleoncoach@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '992608616',
            'cargo' => 'ESPECIALISTA EN EDUCACACION - PRIMARIA',
            'condicion' => 'DESIGNADO',
            'password' =>bcrypt('43139017'),

        ])->assignRole('Especialista_drep');
        /*7*/
        User::create([
            'nombres'  => 'MARY ROSA AMERICA',
            'apellidos'  => 'VILCA CONDORI',
            'dni'  => '01991118',
            'email' => 'matem.drep@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '961500774',
            'cargo' => 'ESPECIALISTA EN EDUCACION - MATEMÁTICA',
            'condicion' => 'NOMBRADA',
            'password' =>bcrypt('01991118'),

        ])->assignRole('Especialista_drep');
        /*8*/
        User::create([
            'nombres'  => 'LUCILA ISABEL',
            'apellidos'  => 'ALEMAN CRUZ',
            'dni'  => '01315665',
            'email' => 'lucecita30edupe@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '950886948',
            'cargo' => 'ESPECIALISTA EN EDUCACIÓN - COMUNICACIÓN',
            'condicion' => 'DESIGNADA',
            'password' =>bcrypt('01315665'),

        ])->assignRole('Especialista_drep');
        /*9*/
        User::create([
            'nombres'  => 'GERVACIA CRISTINA',
            'apellidos'  => 'ALANGUIA COLLATUPA',
            'dni'  => '01225920',
            'email' => 'criss2142@hotmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '951041954',
            'cargo' => 'ESPECIALISTA EN EDUCACIÓN - DPCC',
            'condicion' => 'DESIGNADA',
            'password' =>bcrypt('01225920'),

        ])->assignRole('Especialista_drep');
        /*10*/
        User::create([
            'nombres'  => 'WILFREDO ISIDRO',
            'apellidos'  => 'MAMANI CALDERON',
            'dni'  => '40177589',
            'email' => 'wimasssito@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '951671219',
            'cargo' => 'ESPECIALISTA EN EDUCACION - CIENCIAS SOCIALES',
            'condicion' => 'DESTACADO',
            'password' =>bcrypt('40177589'),

        ])->assignRole('Especialista_drep');
        /*11*/
         User::create([
            'nombres'  => 'RAUL',
            'apellidos'  => 'OHA UMIÑA',
            'dni'  => '01228921',
            'email' => 'ohara.69.69@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '960176117',
            'cargo' => 'ESPECIALISTA EN EDUCACION - EPT',
            'condicion' => 'DESIGNADO',
            'password' =>bcrypt('01228921'),

        ])->assignRole('Especialista_drep');
        /*12*/
        User::create([
            'nombres'  => 'JUDITH BLANCA',
            'apellidos'  => 'VALENCIA PACHO',
            'dni'  => '40471999',
            'email' => 'jvalenciap@drepuno.edu.pe',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '951624638',
            'cargo' => 'ESPECIALISTA  EN EDUCACIÓN - INGLÉS',
            'condicion' => 'DESIGNADA',
            'password' =>bcrypt('40471999'),

        ])->assignRole('Especialista_drep');
        /*13*/
        User::create([
            'nombres'  => 'RAFAEL HERNAN',
            'apellidos'  => 'VILCAPAZA MAMANI',
            'dni'  => '02558226',
            'email' => 'vilcapaza19rafa@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '950449256',
            'cargo' => 'ESPECIALISTA DE ARTE Y CULTURA',
            'condicion' => 'ENCARGADO',
            'password' =>bcrypt('02558226'),

        ])->assignRole('Especialista_drep');
        /*14*/
        User::create([
            'nombres'  => 'GERMAN',
            'apellidos'  => 'COLQUE LIMACHE',
            'dni'  => '02147263',
            'email' => 'germancl_30@hotmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '951632314',
            'cargo' => 'ESPECIALISTA EN RECREACIÓN Y DEPORTES',
            'condicion' => 'DESTACADO',
            'password' =>bcrypt('02147263'),

        ])->assignRole('Especialista_drep');
        /*15*/
        User::create([
            'nombres'  => 'EFRAIN',
            'apellidos'  => 'OLAGUIVEL ITURRY',
            'dni'  => '01335969',
            'email' => 'efrainolaguivel28@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '900550041',
            'cargo' => 'ESPECIALISTA EN EDUCACIÓN - CETPRO Y EBA',
            'condicion' => 'DESTACADO',
            'password' =>bcrypt('01335969'),

        ])->assignRole('Especialista_drep');
        /*16*/
        User::create([
            'nombres'  => 'ROMAN ANDRES ',
            'apellidos'  => 'TICONA RAMOS',
            'dni'  => '01304911',
            'email' => 'romandrestr@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '950417318',
            'cargo' => 'ESPECIALISTA EN EDUCACIÓN - TIC',
            'condicion' => 'ENCARGADO',
            'password' =>bcrypt('01304911'),

        ])->assignRole('Especialista_drep');
        /*17*/
        User::create([
            'nombres'  => 'WILFREDO',
            'apellidos'  => 'BARRIENTOS QUISPE',
            'dni'  => '01306317',
            'email' => 'wilfredobarrientos@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '995511850',
            'cargo' => 'ESPECIALISTA EN EDUCACION - EIB',
            'condicion' => 'DESINGADO',
            'password' =>bcrypt('01306317'),

        ])->assignRole('Especialista_drep');
        /*18*/
        User::create([
            'nombres'  => 'MARIA ROSA',
            'apellidos'  => 'PANIURA QUISPE',
            'dni'  => '01297609',
            'email' => 'paniuraquispemaria@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '951672521',
            'cargo' => 'ESPECIALISTA EN EDUCACION - TOE',
            'condicion' => 'DESTACADO',
            'password' =>bcrypt('01297609'),

        ])->assignRole('Especialista_drep');
         /*19*/
         User::create([
            'nombres'  => 'JAVIER',
            'apellidos'  => 'CUTIPA MAMANI',
            'dni'  => '01314985',
            'email' => 'javierjcm9@hotmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 2,
            'celular' => '944417394',
            'cargo' => 'ASISTENTE EN EDUCACIÓN Y CULTURA',
            'condicion' => 'NOMBRADO',
            'password' =>bcrypt('01314985'),

        ])->assignRole('Especialista_drep');

        ////////////////////////////////////////////////////////////UGEL////////////////
        /*1*/
        User::create([
            'nombres'  => 'MANUEL JUAN',
            'apellidos'  => 'POMA MAMANI',
            'dni'  => '01865321',
            'email' => 'mpoma56@gmail.com',
            'id_ugel' => 3,
            'id_tipo_participante' => 3,
            'celular' => '982342345',
            'cargo' => 'ESPECIALISTA TIC',
            'condicion' => '',
            'password' =>bcrypt('01865321'),

        ])->assignRole('Especialista_ugel');
        /*2*/
        User::create([
            'nombres'  => 'RAUL',
            'apellidos'  => 'CAMACHO CORRALES',
            'dni'  => '29669539',
            'email' => 'raulcc76@gmail.com',
            'id_ugel' => 12,
            'id_tipo_participante' => 3,
            'celular' => '951538092',
            'cargo' => 'ESPECIALISTA TIC - EPT',
            'condicion' => '',
            'password' =>bcrypt('29669539'),

        ])->assignRole('Especialista_ugel');
        /*3*/
        User::create([
            'nombres'  => 'ALEJANDRO',
            'apellidos'  => 'HUANCA QUENAYA',
            'dni'  => '01763814',
            'email' => 'alexhq1960@gmail.com',
            'id_ugel' => 5,
            'id_tipo_participante' => 3,
            'celular' => '951595241',
            'cargo' => 'ESPECIALISTA TIC',
            'condicion' => '',
            'password' =>bcrypt('01763814'),

        ])->assignRole('Especialista_ugel');
        /*4*/
        User::create([
            'nombres'  => 'LEONARDO GODOFREDO',
            'apellidos'  => 'MULLISACA MAMANI ',
            'dni'  => '01539825',
            'email' => 'lgodofredo@gmail.com',
            'id_ugel' => 4,
            'id_tipo_participante' => 3,
            'celular' => '931240218',
            'cargo' => 'ESPECIALISTA TIC',
            'condicion' => '',
            'password' =>bcrypt('01539825'),

        ])->assignRole('Especialista_ugel');
        /*5*/
        User::create([
            'nombres'  => 'DAVID',
            'apellidos'  => 'RAMIREZ CHOQUEHUANCA',
            'dni'  => '29655782',
            'email' => 'david27cher@gmail.com',
            'id_ugel' => 9,
            'id_tipo_participante' => 3,
            'celular' => '982570908',
            'cargo' => 'ESPECIALISTA TIC',
            'condicion' => '',
            'password' =>bcrypt('29655782'),

        ])->assignRole('Especialista_ugel');
        /*6*/
        User::create([
            'nombres'  => 'OMAR EDWIN',
            'apellidos'  => 'DE LA CRUZ CALSIN ',
            'dni'  => '02434058',
            'email' => 'omarexample@gmail.com',
            'id_ugel' => 7,
            'id_tipo_participante' => 3,
            'celular' => '958394313',
            'cargo' => 'ESPECIALISTA CyT - LIDER TECNOLOGICO',
            'condicion' => '',
            'password' =>bcrypt('02434058'),

        ])->assignRole('Especialista_ugel');
        /*7*/
        User::create([
            'nombres'  => 'EDWIN LEONET',
            'apellidos'  => 'FIGUEROA QUISPE',
            'dni'  => '01296539',
            'email' => 'edfi91@gmail.com',
            'id_ugel' => 11,
            'id_tipo_participante' => 3,
            'celular' => '951527881',
            'cargo' => 'JEFE DE GESTION PEDAGOGICA',
            'condicion' => '',
            'password' =>bcrypt('01296539'),

        ])->assignRole('Especialista_ugel');
        /*8*/
        User::create([
            'nombres'  => 'ABDON PEDRO',
            'apellidos'  => 'GARNICA RAMOS',
            'dni'  => '01345142',
            'email' => 'garnica.peru@gmail.com',
            'id_ugel' => 10,
            'id_tipo_participante' => 3,
            'celular' => '951727806',
            'cargo' => 'ESPECIALISTA TIC',
            'condicion' => '',
            'password' =>bcrypt('01345142'),

        ])->assignRole('Especialista_ugel');
        /*9*/
        User::create([
            'nombres'  => 'FERDINAN',
            'apellidos'  => 'FLORES',
            'dni'  => '00000000',
            'email' => 'siagie@ugelmoho.edu.pe',
            'id_ugel' => 13,
            'id_tipo_participante' => 3,
            'celular' => '932389618',
            'cargo' => 'ESPECIALISTA TIC y SIAGIE',
            'condicion' => '',
            'password' =>bcrypt('00000000'),

        ])->assignRole('Especialista_ugel');
        /*10*/
        User::create([
            'nombres'  => 'DAYME ADALID',
            'apellidos'  => 'NUÑEZ AROAPAZA',
            'dni'  => '01323385',
            'email' => 'dayme.adalid@gmail.com',
            'id_ugel' => 1,
            'id_tipo_participante' => 3,
            'celular' => '956295038',
            'cargo' => 'ESPECIALISTA TIC',
            'condicion' => '',
            'password' =>bcrypt('01323385'),

        ])->assignRole('Especialista_ugel');
        /*11*/
         User::create([
            'nombres'  => 'PABLO',
            'apellidos'  => 'REYES TURPO',
            'dni'  => '42296733',
            'email' => 'pcreyest.ugelsap@gmail.com',
            'id_ugel' => 14,
            'id_tipo_participante' => 3,
            'celular' => '978369292',
            'cargo' => 'ESPECIALISTA EPT y TIC',
            'condicion' => '',
            'password' =>bcrypt('42296733'),

        ])->assignRole('Especialista_ugel');
        /*12*/
        User::create([
            'nombres'  => 'IDME',
            'apellidos'  => 'MACHACA MIRIAM',
            'dni'  => '02366401',
            'email' => 'idmemiriam@gmail.com',
            'id_ugel' => 6,
            'id_tipo_participante' => 3,
            'celular' => '951571175',
            'cargo' => 'ESPECIALISTA TIC',
            'condicion' => '',
            'password' =>bcrypt('02366401'),

        ])->assignRole('Especialista_ugel');
        /*13*/
        User::create([
            'nombres'  => 'ORLANDO',
            'apellidos'  => 'CALCINA TITO',
            'dni'  => '42041101',
            'email' => 'vorland.tito@gmail.com',
            'id_ugel' => 3,
            'id_tipo_participante' => 3,
            'celular' => '992748760',
            'cargo' => 'ESPECIALISTA TIC, EPT Y EBA',
            'condicion' => '',
            'password' =>bcrypt('42041101'),

        ])->assignRole('Especialista_ugel');
        /*14*/
        User::create([
            'nombres'  => 'JAVIER',
            'apellidos'  => 'SALAS CALLE',
            'dni'  => '01318002',
            'email' => 'javiersalascalle@gmail.com',
            'id_ugel' => 8,
            'id_tipo_participante' => 3,
            'celular' => '955914942',
            'cargo' => 'ESPECIALISTA TIC, EDUCACIÓN PARA EL TRABAJO y CETPRO',
            'condicion' => '',
            'password' =>bcrypt('01318002'),

        ])->assignRole('Especialista_ugel');
        
    }
}
