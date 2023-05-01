<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use App\Repository\ThemeRepository;
use App\Repository\AnswerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{

    private ThemeRepository $themeRepository;
    private AnswerRepository $answerRepository;
    private SerializerInterface $serializer;
    private EntityManagerInterface $entityManager;
    private QuestionRepository $questionRepository;

    /**
     * @param ThemeRepository $themeRepository
     * @param SerializerInterface $serializer
     * @param EntityManagerInterface $entityManager
     * @param QuestionRepository $questionRepository
     */public function __construct(ThemeRepository $themeRepository, AnswerRepository $anwserRepository, SerializerInterface $serializer, EntityManagerInterface $entityManager, QuestionRepository $questionRepository)
    {
        $this->themeRepository = $themeRepository;
        $this->answerRepository = $anwserRepository;
        $this->serializer = $serializer;
        $this->entityManager = $entityManager;
        $this->questionRepository = $questionRepository;
    }

    #[Route('/api/themes', name: 'app_api_themes')]
    public function themesGet(): Response
    {

        $themes = $this->themeRepository->findAll();

        $json = $this->serializer->serialize($themes, "json", ['groups' => 'get_themes']);

        return new Response($json, 200, []);

    }

    #[Route('/api/quiz/{themeSlug}/{nbQuestion}', name: 'app_api_generate_quiz')]
    public function generateQuiz(string $themeSlug, int $nbQuestion): Response
    {

        $sql = "
            SELECT q.id, q.text, q.slug
            FROM question q INNER JOIN theme t ON q.theme_id = t.id 
            WHERE t.slug = :themeSlug 
            ORDER BY RAND() 
            LIMIT :nbQuestion
        ";

        $rsm = new ResultSetMapping;
        $rsm->addEntityResult('App\Entity\Question', 'q');
        $rsm->addFieldResult('q', 'id', 'id');
        $rsm->addFieldResult('q', 'slug', 'slug');
        $rsm->addFieldResult('q', 'text', 'text');

        $query = $this->entityManager->createNativeQuery($sql, $rsm);
        $query->setParameter('themeSlug', $themeSlug);
        $query->setParameter('nbQuestion', $nbQuestion);

        $questions = $query->getResult();

        if(empty($questions)) {

            return new Response("Error: Theme not found", 404, []);

        }

        $json = $this->serializer->serialize($questions, "json", ['groups' => 'get_questions']);

        return new Response($json, 200, []);

    }

    #[Route('/api/question/answers/{questionSlug}', name: 'app_api_question_anwsers', methods: ["get"])]
    public function getQuestionAnswers(string $questionSlug): Response
    {

        $question = $this->questionRepository->findOneBy(["slug" => $questionSlug]);

        if(empty($question)) {

            return new Response("Error: Question not found", 404, []);

        }

        $answers = $question->getAnswers();

        $json = $this->serializer->serialize($answers, "json", ['groups' => 'get_answers']);

        return new Response($json, 200, []);

    }

    #[Route('/api/question/answers', name: 'app_api_post_question_answers', methods: ["post"])]
    public function postQuestionAnswers(Request $request): Response
    {
        $returnAnswers = [];

        $answers = $request->toArray();

        foreach($answers as $key => $answer) {

            $returnAnswers[] = [
                "key" => $key,
                "id" => $answers,
                "question" => $this->answerRepository->find($answer)->getQuestion()->getText(),
                "isCorrect" => $this->answerRepository->find($answer)->isCorrect()
            ];

        }

        return new Response(json_encode($returnAnswers) , 200, []);

    }
}
