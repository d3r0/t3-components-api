<?php
declare(strict_types=1);
namespace D3r0\ComponentsApi\Routing\Enhancer;

use D3r0\ComponentsApi\Service\RouteService;
use TYPO3\CMS\Core\Routing\Enhancer\AbstractEnhancer;
use TYPO3\CMS\Core\Routing\Enhancer\RoutingEnhancerInterface;
use TYPO3\CMS\Core\Routing\Route;
use TYPO3\CMS\Core\Routing\RouteCollection;

/**
 * routeEnhancers:
 *   T3api:
 *     type: T3apiResourceEnhancer
 */
class ResourceEnhancer extends AbstractEnhancer implements RoutingEnhancerInterface
{
    public const ENHANCER_NAME = 'ComponentsApiResourceEnhancer';

    /**
     * @var array
     */
    protected $configuration;

    /**
     * @var string
     */
    protected $basePath;

    /**
     * ResourceEnhancer constructor.
     *
     * @param array $configuration
     */
    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
        $this->basePath = RouteService::getApiBasePath();
    }

    /**
     * {@inheritdoc}
     */
    public function enhanceForMatching(RouteCollection $collection): void
    {
        /** @var Route $variant */
        $variant = clone $collection->get('default');
        $variant->setPath($this->basePath . '/{t3apiResource?}');
        $variant->setRequirement('t3apiResource', '.*');
        $collection->add('enhancer_' . $this->basePath . spl_object_hash($variant), $variant);
    }

    /**
     * {@inheritdoc}
     * // @todo Think if it ever could be needed
     */
    public function enhanceForGeneration(RouteCollection $collection, array $parameters): void
    {
    }
}
