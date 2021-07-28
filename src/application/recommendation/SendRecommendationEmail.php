<?php
namespace Src\application\recommendation;

interface SendRecommendationEmail
{
    public function sendTo(Student $indicatedStudent): void;
}