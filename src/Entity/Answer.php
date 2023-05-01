<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['get_answers'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['get_answers'])]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'Responses')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Question $question = null;

    #[ORM\Column]
    private ?bool $correct = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function isCorrect(): ?bool
    {
        return $this->correct;
    }

    public function setCorrect(bool $correct): self
    {
        $this->correct = $correct;

        return $this;
    }
}
