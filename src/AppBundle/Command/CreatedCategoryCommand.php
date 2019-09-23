<?php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use AppBundle\Entity\Category;
use Symfony\Component\Console\Input\InputArgument;

class CreatedCategoryCommand extends ContainerAwareCommand
{
    
    protected static $defaultName = 'app:create-category';

    protected function configure()
    {
        $this  
        ->setDescription('Creates a new category.')        
        ->setHelp('This command allows you to create a category...')
        ->addArgument('name',InputArgument::REQUIRED , 'Category name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("creating category named ".$input->getArgument('name'));
        $em =$this->getContainer()->get('doctrine')->getEntityManager();
        $category = new Category;
        $category->setLabel($input->getArgument('name'));
        $category->setName($input->getArgument('name'));
        $em->persist($category);
        $em->flush();
        $output->writeln("category named ".$input->getArgument('name')." has been created");
    }
}