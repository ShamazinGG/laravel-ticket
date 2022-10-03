<?php

namespace Coderflex\LaravelTicket;

use Illuminate\Support\ServiceProvider;

class TicketServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/laravel_ticket.php' => config_path('laravel-ticket.php'),
        ], 'ticket-config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_categories_table.php.stub' => database_path(
                sprintf('migrations/%s_create_categories_table.php', date('Y_m_d_His'))
            ),

            __DIR__ . '/../database/migrations/create_category_ticket_table.php.stub' => database_path(
                sprintf('migrations/%s_create_category_ticket_table.php', date('Y_m_d_His'))
            ),

            __DIR__ . '/../database/migrations/create_label_ticket_table.php.stub' => database_path(
                sprintf('migrations/%s_create_label_ticket_table.php', date('Y_m_d_His'))
            ),

            __DIR__ . '/../database/migrations/create_labels_table.php.stub' => database_path(
                sprintf('migrations/%s_create_labels_table.php', date('Y_m_d_His'))
            ),

            __DIR__ . '/../database/migrations/create_tickets_messages_table.php.stub' => database_path(
                sprintf('migrations/%s_create_tickets_messages_table.php', date('Y_m_d_His'))
            ),

            __DIR__ . '/../database/migrations/create_tickets_table.php.stub' => database_path(
                sprintf('migrations/%s_create_tickets_table.php', date('Y_m_d_His'))
            ),
        ], 'ticket-migrations');
    }
}
