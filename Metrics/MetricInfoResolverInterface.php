<?php

declare(strict_types=1);

namespace Artprima\PrometheusMetricsBundle\Metrics;

use Artprima\PrometheusMetricsBundle\DependencyInjection\Compiler\MetricInfoResolverCompilerPass;
use Symfony\Component\HttpFoundation\Request;

/**
 * Implementation of this interface should resolve MetricInfo object based on the HttpFoundation request.
 *
 * Implementation is optional. If not provided AppMetrics will create labels in following format: [requestMethod-requestRoute].
 *
 * If implemented, tag it with `artprima.prometheus_metrics.metric_info_resolver` in the service container.
 *
 * @see MetricInfoResolverCompilerPass
 */
interface MetricInfoResolverInterface
{
    /**
     * Resolve MetricInfo object based on the HttpFoundation request.
     *
     * Labels values are resolved from the request and passed to this method.
     * For example, if labels are defined as ['color', 'client_name'],
     * and request has 'color' => 'red' and 'client_name' => 'mobile-app',
     * then labelValues will be ['red', 'mobile-app'].
     *
     * @param array<string> $labelValues
     */
    public function resolveData(Request $request, array $labelValues = []): MetricInfo;
}
