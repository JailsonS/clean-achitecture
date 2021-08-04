<?php
namespace Src\academy\application\recommendation;

interface SendRecommendationEmail
{
    public function sendTo(Student $indicatedStudent): void;
}