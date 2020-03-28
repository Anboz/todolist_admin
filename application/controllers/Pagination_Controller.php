<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Pagination_Controller extends CI_Controller {
			function pagination($total_rows)
			{
				 $this->load->library("pagination");
				 $page_config = array(
					 'base_url' => '#',
					 'total_rows' => $total_rows,
					 'per_page' => 10,
					 'uri_segment' => 3,
					 'use_page_number' => true,
					 'full_tag_open' => "<ul class='pagination'>",
					 'full_tag_close' => "</ul>",
					 'first_tag_open' => "<li>",
					 'first_tag_close' => "</li>",
					 'last_tag_open' => "<li>",
					 'last_tag_close' => '</li>',
					 'next_link' => ">>",
					 'next_tag_open' => "<li>",
					 'next_tag_close' => "</li>",
					 'prev_link' => "<<",
					 'prev_tag_open' => '<li>',
					 'prev_tag_close' => '</li>',
					 'cur_tag_open' => "<li class='active'><a href='#'>",
					 'cur_tag_close' => ='</a></li>',
					 'num_tag_open' => "<li>",
					 'num_tag_close' => '</li>',
					 'num_links' => 1					 				 		
					 );
				$this->pagination->initialize($page_config);
				$page = $this->uri=>segment(3);
				$start = ($page - 1) * $page_config['per_page'];
				$out = array(
				'pagination_link' => $this->pagination->create_links(),
				
				);
				 
			}


        }


?>