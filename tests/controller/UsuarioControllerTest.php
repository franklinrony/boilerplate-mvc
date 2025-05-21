<?php
declare(strict_types=1);

namespace pdes\tests\controller;

use pdes\controller\UsuarioController;
use pdes\tests\BaseTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Twig\Environment as Twig_Environment; // Alias for clarity if needed, adjust based on Twig version
use Twig\TemplateWrapper as Twig_TemplateInterface; // Alias for clarity, adjust based on Twig version

class UsuarioControllerTest extends BaseTestCase
{
    private $formFactoryMock;
    private $formMock;
    private $formViewMock;
    private $twigMock;
    private $twigTemplateMock;
    private $requestMock; // Will be setup in each test as needed

    protected function setUp(): void
    {
        parent::setUp();

        $this->formFactoryMock = $this->createMock(FormFactoryInterface::class);
        $this->formMock = $this->createMock(FormInterface::class);
        $this->formViewMock = $this->createMock(FormView::class);
        $this->twigMock = $this->createMock(Twig_Environment::class); // Use aliased name
        $this->twigTemplateMock = $this->createMock(Twig_TemplateInterface::class); // Use aliased name

        $this->formFactoryMock->method('createBuilder')->willReturn($this->formMock);
        
        // Allow 'add' to be called any number of times and return the form mock itself (builder pattern)
        $this->formMock->method('add')->willReturn($this->formMock);
        $this->formMock->method('getForm')->willReturn($this->formMock);
        
        $this->formMock->method('handleRequest')->willReturnSelf();
        $this->formMock->method('createView')->willReturn($this->formViewMock);

        $this->twigMock->method('loadTemplate')->willReturn($this->twigTemplateMock);
        
        // Make $formFactory available globally for the controller
        // This is a simplification. Ideally, FormFactory would be injected.
        // For now, to match controller's direct global usage:
        global $formFactory;
        $formFactory = $this->formFactoryMock;
        
        // Same for $twig global
        global $twig;
        $twig = $this->twigMock;

    }

    public function testRegistroRendersViewOnGetRequest(): void
    {
        // Simulate a GET request scenario
        $this->formMock->method('isSubmitted')->willReturn(false);
        $this->formMock->method('isValid')->willReturn(false); // Does not matter much if not submitted

        // Mock Request
        // The controller uses Request::createFromGlobals(). For this test, we ensure that
        // the form's handleRequest is called, which is what matters for the GET path.
        // A more direct mock of Request::createFromGlobals() would require more complex setup
        // or refactoring the controller to allow Request injection.

        $controller = new UsuarioController();

        $this->twigMock->expects($this->once())->method('loadTemplate')->with('registro.twig');
        $this->twigTemplateMock->expects($this->once())->method('render')->with(['form' => $this->formViewMock]);
        $this->formMock->expects($this->once())->method('createView');
        // We also need to expect the form's handleRequest to be called.
        $this->formMock->expects($this->once())->method('handleRequest');


        // Suppress output from echo
        ob_start();
        $controller->registro(); // This will use global $twig and $formFactory
        ob_end_clean();
    }
    
    // Add more tests here for form submission (valid/invalid) and guardar() call
}
