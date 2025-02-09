<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TicketRepositoryInterface;
use App\Repositories\TicketRepository;

class FrontService
{
          protected $categoryRepository;
          protected $ticketRepository;
          // protected $bookingRepository; 

          public function __construct (TicketRepositoryInterface $ticketRepository, CategoryRepositoryInterface $categoryRepository)
          {
                    $this->ticketRepository = $ticketRepository;
                    $this->categoryRepository = $categoryRepository;
          }

          public function getFrontPageData()
          {
                    $categories = $this->categoryRepository->getAllCategories();
                    $tickets = $this->ticketRepository->getPopularTickets(4);
                    $newTickets = $this->ticketRepository->getAllNewTickets();

                    return compact('categories', 'popularTickets', 'tickets');
          }
}