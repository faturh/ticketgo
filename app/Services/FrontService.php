<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\SellerRepositoryInterface;
use App\Repositories\Contracts\TicketRepositoryInterface;
use App\Repositories\TicketRepository;

class FrontService
{
          protected $categoryRepository;
          protected $ticketRepository;
          protected $sellerRepository; 

          public function __construct (TicketRepositoryInterface $ticketRepository, CategoryRepositoryInterface $categoryRepository, SellerRepositoryInterface $sellerRepository)
          {
                    $this->ticketRepository = $ticketRepository;
                    $this->categoryRepository = $categoryRepository;
                    $this->sellerRepository = $sellerRepository;
          }

          public function getFrontPageData()
          {
                    $categories = $this->categoryRepository->getAllCategories();
                    $sellers = $this->sellerRepository->getAllSellers();
                    $tickets = $this->ticketRepository->getPopularTickets(4);
                    $newTickets = $this->ticketRepository->getAllNewTickets();

                    return compact('categories', 'sellers', 'popularTickets', 'tickets');
          }
}