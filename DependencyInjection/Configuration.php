<?php
namespace MovingImage\Bundle\VideoCollection\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 *
 * @author Ruben Knol <ruben.knol@movingimage.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Define configuration structure for this bundle.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('video_collections');

        $rootNode
            ->children()
                ->arrayNode('collections')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('data_provider')
                                ->defaultValue('vmpro')
                            ->end()
                            ->scalarNode('channel_id')
                            ->end()
                            ->arrayNode('channel_ids')
                                ->prototype('scalar')
                                ->end()
                            ->end()
                            ->scalarNode('search_term')
                            ->end()
                            ->scalarNode('search_field')
                            ->end()
                            ->scalarNode('order_property')
                            ->end()
                            ->scalarNode('vm_id')
                                ->isRequired()
                            ->end()
                            ->integerNode('limit')
                                ->defaultValue(12)
                            ->end()
                            ->integerNode('offset')
                            ->end()
                            ->scalarNode('order_by')
                            ->end()
                            ->enumNode('order')
                                ->values(['desc', 'asc', null])
                            ->end()
                            ->arrayNode('filter')
                                ->prototype('scalar')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
