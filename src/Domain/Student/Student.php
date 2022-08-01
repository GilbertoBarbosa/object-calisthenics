<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Video\Video;
use Alura\Calisthenics\Domain\Email\Email;
use DateTimeInterface;
use Ds\Map;

require 'vendor/autoload.php';

class Student
{
    private Email $email;
    private DateTimeInterface $birthDate;
    private WatchedVideos $watchedVideos;
    private string $firstName;
    private string $lastName;
    public string $street;
    public string $number;
    public string $province;
    public string $city;
    public string $state;
    public string $country;

    public function __construct(Email $email, DateTimeInterface $birthDate, 
                    string $firstName, string $lastName, string $street, string $number, 
                    string $province, string $city, string $state, string $country)
    {
        $this->watchedVideos = new Map();
        $this->email = $email;
        $this->bd = $birthDate;
        $this->fName = $firstName;
        $this->lName = $lastName;
        $this->street = $street;
        $this->number = $number;
        $this->province = $province;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function fullName(): string
    {
        return "{$this->fName} {$this->lName}";
    }

    public function Email(): Email
    {
        return $this->email;
    }

    public function birthDate(): DateTimeInterface
    {
        return $this->bd;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->count() === 0) {
            return true;
        }
        
        $firstDate = $this->watchedVideos->dateOfFirstVideo();
        $today = new \DateTimeImmutable();

        return $firstDate->diff($today)->days < 90;
    }

    public function age(): int
    {
        $today = new \DateTimeImmutable();
        $dataInterval = $this->birthDate()->diff($today);

        return $dataInterval->y;
    }
}
