<?php

use Illuminate\Database\Seeder;
use App\pregunta;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         /**ugel**/
         pregunta::create([
            'numero' => 1,
            'enunciado'  => 'Participa del fortalecimiento de capacidades organizadas por la DREP u otras instituciones para fortalecer el uso de entornos virtuales.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 1
        ]);
        pregunta::create([
            'numero' => 2,
            'enunciado'  => 'Promueve comunidades virtuales de aprendizaje con directivos y/o docentes a fin de fortalecer la gestión institucional y/o las capacidades pedagógicas.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 1
        ]);
        pregunta::create([
            'numero' => 3,
            'enunciado'  => 'Utiliza herramientas virtuales Google Workspace (Classroom) y otros en el trabajo con directivos y/o docentes para el fortalecimiento de la gestión institucional y/o las capacidades pedagógicas.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 1
        ]);
        pregunta::create([
            'numero' => 4,
            'enunciado'  => 'Realiza monitoreo y asistencia técnica a directivos y/o docentes en el uso de Google Workspace (Classroom) y otros.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 1
        ]);
        pregunta::create([
            'numero' => 5,
            'enunciado'  => 'Participa de las actividades de soporte socioemocional organizadas por la DREP u otras instituciones.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 2
        ]);
        pregunta::create([
            'numero' => 6,
            'enunciado'  => 'Desarrolla actividades de soporte socioemocional a directivos  y/o docentes en reuniones, jornadas de trabajo, asistencias técnicas u otros.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 2
        ]);
        pregunta::create([
            'numero' => 7,
            'enunciado'  => 'Promueve en directores y docentes el uso de estrategias para el acompañamiento socioafectivo y cognitivo en los estudiantes.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 2
        ]);
        pregunta::create([
            'numero' => 8,
            'enunciado'  => 'Realiza monitoreo a directivos y/o docentes acerca del desarrollo de actividades de soporte socioemocional en el marco del diálogo reflexivo.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 2
        ]);
        pregunta::create([
            'numero' => 9,
            'enunciado'  => 'Participa del fortalecimiento de capacidades organizadas por la DREP u otras instituciones para implementar el “Aprendizaje Basado en Proyectos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 3
        ]);
        pregunta::create([
            'numero' => 10,
            'enunciado'  => 'Realiza fortalecimiento de capacidades a directivos y/o docentes sobre el “Aprendizaje Basado en Proyectos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 3
        ]);
        pregunta::create([
            'numero' => 11,
            'enunciado'  => 'Realiza fortalecimiento de capacidades a directivos y/o docentes sobre la mediación y evaluación del “Aprendizaje Basado en Proyectos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 3
        ]);
        pregunta::create([
            'numero' => 12,
            'enunciado'  => 'Realiza monitoreo y asistencia técnica a directivos y/o docentes en el “Aprendizaje Basado en Proyectos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 3
        ]);
        pregunta::create([
            'numero' => 13,
            'enunciado'  => 'Participa del fortalecimiento de capacidades sobre la prevención y cuidado de la COVID – 19.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 4
        ]);
        pregunta::create([
            'numero' => 14,
            'enunciado'  => 'Considera en su plan de trabajo, estrategias para el cuidado y prevención frente a la COVID -19.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 4
        ]);
        pregunta::create([
            'numero' => 15,
            'enunciado'  => 'Realiza orientaciones a directivos y/o docentes sobre la prevención y cuidado frente a la COVID -19.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 4
        ]);
        pregunta::create([
            'numero' => 16,
            'enunciado'  => 'Participa en las jornadas pedagógicas organizadas por la DREP u otras instituciones sobre planificación, mediación y evaluación formativa.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 17,
            'enunciado'  => 'Realiza el fortalecimiento dirigido a directivos y/o docentes en planificación, mediación y evaluación formativa.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 18,
            'enunciado'  => 'Efectúa el fortalecimiento en la diversificación de las experiencias de aprendizaje de “Aprendo en casa” vinculandola con el uso de recursos tecnológicos como gestor de contenidos, aplicativos y utilitarios de las tabletas.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 19,
            'enunciado'  => 'Efectúa acciones para garantizar que los docentes desarrollen los cursos del “Programa Nacional para la mejora  de los aprendizajes”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 20,
            'enunciado'  => 'Fortalece a directivos y/o docentes sobre la implementación y desarrollo del “Plan lector” y “Leemos juntos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 21,
            'enunciado'  => 'Orienta a directivos y docentes modelando sobre los componentes de las experiencias de aprendizaje para el desarrollo de las competencias, promoviendo la integración de las áreas curriculares.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 22,
            'enunciado'  => 'Promueve espacios de intercambio de experiencias de aprendizaje innovadoras y creativas en el marco inclusivo e intercultural a directivos y docentes.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 23,
            'enunciado'  => 'Realiza asistencia técnica sobre el “Acompañamiento del aprendizaje” a directivos y docentes a través de GIAs, talleres virtuales u otros.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 24,
            'enunciado'  => 'Promueve la aplicación de estrategias de mediación para el desarrollo de competencias  a directivos y/o docentes, permitiéndoles reflexionar y ajustar su práctica pedagógica.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 25,
            'enunciado'  => 'Brinda orientaciones sobre la evaluación para el aprendizaje referidos a formulación de criterios, instrumentos y retroalimentación. ',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 26,
            'enunciado'  => 'Realiza orientaciones sobre la evaluación del aprendizaje de acuerdo a la normativa nacional con fines de promoción y certificación de los aprendizajes.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        pregunta::create([
            'numero' => 27,
            'enunciado'  => 'Efectúa el monitoreo y la asistencia técnica de los procesos curriculares y didácticos para el desarrollo de experiencias de aprendizaje en el marco del diálogo reflexivo.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 5
        ]);
        
        pregunta::create([
            'numero' => 28,
            'enunciado'  => 'Impulsa la participación de los diferentes actores  educativos en el desarrollo de actividades por el Bicentenario de nuestra independencia.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 6
        ]);
        pregunta::create([
            'numero' => 29,
            'enunciado'  => 'Promueve la ejecución de diversas actividades con participación estudiantil con el objetivo de reflexionar sobre el Bicentenario de nuestra independencia.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 6
        ]);
        pregunta::create([
            'numero' => 30,
            'enunciado'  => 'Fomenta espacios de análisis y reflexión con participación de las autoridades e instituciones de la sociedad civil para establecer  compromisos desde el Bicentenario. ',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 6
        ]);

        /***director */
        pregunta::create([
            'numero' => 1,
            'enunciado'  => 'Participa del fortalecimiento de capacidades organizadas por la DRE, UGEL u otras instituciones para fortalecer el uso de entornos virtuales.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 7
        ]);
        pregunta::create([
            'numero' => 2,
            'enunciado'  => 'Promueve comunidades virtuales de aprendizaje con docentes a fin de fortalecer las capacidades pedagógicas.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 7
        ]);
        pregunta::create([
            'numero' => 3,
            'enunciado'  => 'Utiliza herramientas virtuales Google Workspace (Classroom) y otros con docentes para el fortalecimiento de las capacidades pedagógicas.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 7
        ]);
        pregunta::create([
            'numero' => 4,
            'enunciado'  => 'Realiza monitoreo y acompañamiento pedagógico a  docentes en el uso de Google Workspace (Classroom) y otros.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 7
        ]);
        pregunta::create([
            'numero' => 5,
            'enunciado'  => 'Participa de las actividades de soporte socioemocional organizadas por la DRE, UGEL u otras instituciones.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 8
        ]);
        pregunta::create([
            'numero' => 6,
            'enunciado'  => 'Desarrolla actividades de soporte socioemocional a docentes en reuniones, jornadas de trabajo, asistencias técnicas u otros.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 8
        ]);
        pregunta::create([
            'numero' => 7,
            'enunciado'  => 'Promueve en docentes el uso de estrategias para el acompañamiento socioafectivo y cognitivo en los estudiantes.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 8
        ]);
        pregunta::create([
            'numero' => 8,
            'enunciado'  => 'Realiza monitoreo a  docentes acerca del desarrollo de actividades de soporte socioemocional en el marco del diálogo reflexivo.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 8
        ]);
        pregunta::create([
            'numero' => 9,
            'enunciado'  => 'Participa del fortalecimiento de capacidades organizadas por la DREP, UGEL u otras instituciones para implementar el “Aprendizaje Basado en  Proyectos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 9
        ]);
        pregunta::create([
            'numero' => 10,
            'enunciado'  => 'Realiza fortalecimiento de capacidades a docentes sobre el diseño de  proyectos de aprendizaje.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 9
        ]);
        pregunta::create([
            'numero' => 11,
            'enunciado'  => 'Realiza fortalecimiento de capacidades a docentes sobre la mediación y evaluación del “Aprendizaje Basado en Proyectos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 9
        ]);
        pregunta::create([
            'numero' => 12,
            'enunciado'  => 'Realiza monitoreo y acompañamiento a docentes en el “Aprendizaje Basado en Proyectos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 9
        ]);
        pregunta::create([
            'numero' => 13,
            'enunciado'  => 'Participa del fortalecimiento de capacidades sobre la prevención y cuidado de la COVID – 19.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 10
        ]);
        pregunta::create([
            'numero' => 14,
            'enunciado'  => 'Considera en su Plan Anual de Trabajo, estrategias para el cuidado y prevención frente a la COVID -19.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 10
        ]);
        pregunta::create([
            'numero' => 15,
            'enunciado'  => 'Realiza orientaciones a docentes sobre la prevención y cuidados frente a la COVID -19.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 10
        ]);
        pregunta::create([
            'numero' => 16,
            'enunciado'  => 'Participa en las jornadas pedagógicas organizadas por la DREP, UGEL u otras instituciones sobre planificación, mediación y evaluación formativa.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 17,
            'enunciado'  => 'Realiza actividades de fortalecimiento dirigido a docentes en planificación, mediación y evaluación formativa.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 18,
            'enunciado'  => 'Efectúa el fortalecimiento en la diversificación de las experiencias de aprendizaje de “Aprendo en casa” haciendo uso de recursos digitales*(gestor de contenidos, Apps educativas y utilitarios) de las tabletas.(solo en IE que cuentan con tabletas).',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 19,
            'enunciado'  => 'Efectúa acciones para garantizar que los docentes desarrollen los cursos del “Programa Nacional para la mejora  de los aprendizajes”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 20,
            'enunciado'  => 'Fortalece a docentes sobre la implementación y desarrollo del “Plan lector” y “Leemos juntos”.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 21,
            'enunciado'  => 'Orienta a docentes modelando sobre los componentes de las experiencias de aprendizaje para el desarrollo de las competencias, promoviendo la integración de las áreas curriculares.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 22,
            'enunciado'  => 'Promueve en docentes espacios de intercambio de experiencias de aprendizaje innovadoras y creativas en el marco inclusivo e intercultural.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 23,
            'enunciado'  => 'Realiza fortalecimiento de capacidades a docentes sobre el “Acompañamiento del aprendizaje” a través de GIAs, talleres virtuales u otros.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 24,
            'enunciado'  => 'Organiza actividades que promuevan en los docentes la aplicación de estrategias de mediación para el desarrollo de competencias.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 25,
            'enunciado'  => 'Implementa actividades de orientación sobre la evaluación para el aprendizaje referidos a formulación de criterios, instrumentos y retroalimentación. ',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 26,
            'enunciado'  => 'Realiza orientaciones a docentes sobre la evaluación del aprendizaje de acuerdo a la normativa nacional con fines de promoción y certificación de los aprendizajes.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        pregunta::create([
            'numero' => 27,
            'enunciado'  => 'Efectúa monitoreo y acompañamiento a docentes sobre procesos curriculares y didácticos para el desarrollo de experiencias de aprendizaje en el marco del diálogo reflexivo.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 11
        ]);
        
        pregunta::create([
            'numero' => 28,
            'enunciado'  => 'Impulsa la participación de los diferentes actores  educativos en el desarrollo de actividades por el Bicentenario de nuestra independencia.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 12
        ]);
        pregunta::create([
            'numero' => 29,
            'enunciado'  => 'Promueve la ejecución de diversas actividades con participación estudiantil con el objetivo de reflexionar sobre el Bicentenario de nuestra independencia.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 12
        ]);
        pregunta::create([
            'numero' => 30,
            'enunciado'  => 'Promueve espacios de análisis y reflexión con participación de aliados estratégicos para establecer compromisos desde el Bicentenario.',
            'calificacion' => 1,
            'clave'   => 1,
            'id_categoria' => 12
        ]);

       

    }
}
