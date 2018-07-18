<?php

declare(strict_types=1);

namespace FTC\Trello;

class ConfigProvider
{

    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
            'predispatch-pipe' => [
                FTC\WebAdmin\Handler\MembersManagement::class => [
                    FTC\Trello\Middleware\CheckMemberCard::class,
                    FTC\Trello\Middleware\CreateMemberCard::class,
                ],
            ],
        ];
    }

    public function getDependencies() : array
    {
        
        return [
            'delegators' => [
            ],
            'invokables' => [
            ],
            'factories'  => [
                FTC\Trello\Middleware\CheckMemberCard::class => FTC\Trello\Container\Middleware\CheckMemberCardFactory::class,
                FTC\Trello\Middleware\CreateMemberCard::class => FTC\Trello\Container\Middleware\CreateMemberCardFactory::class,
                FTC\Trello\Model\CardRepository::class => FTC\Trello\Container\Model\CardRepositoryFactory::class,
                FTC\Trello\Client::class => FTC\Trello\Container\ClientFactory::class,
            ],
        ];
    }

    public function getTemplates() : array
    {
        return [
        ];
    }
}
