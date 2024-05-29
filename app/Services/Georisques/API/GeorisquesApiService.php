<?php

namespace App\Services\Georisques\Api;

use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Services\Ubiflow\Api\Resources\Contracts\AuthResource;
use App\Services\Ubiflow\Api\Resources\MailTrackingContactResource;

class GeorisquesApiService
{
    public const DEFAULT_BASE_URL = 'https://api-classifieds.ubiflow.net/api';

    protected readonly array $options;

    public function __construct(public readonly AuthResource $auth, array $options = [])
    {
        $this->options = $this->configureOptions(new OptionsResolver)->resolve($options);
    }

    public function configureOptions(OptionsResolver $resolver) : OptionsResolver
    {
        return $resolver->setDefaults([
            'base_url' => self::DEFAULT_BASE_URL,
            'timeout'  => 30,
        ]);
    }
}
