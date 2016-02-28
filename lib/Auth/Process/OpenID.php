<?php

class sspmod_openidsir_Auth_Process_OpenID extends SimpleSAML_Auth_ProcessingFilter {

	/**
	 * Apply filter to add or replace attributes.
	 *
	 * Add or replace existing attributes with the configured values.
	 *
	 * @param array &$request  The current request
	 */
	public function process(&$request) {
		assert('is_array($request)');
		assert('array_key_exists("Attributes", $request)');

        $attributes = $request['Attributes'];
        if (empty($attributes["openid"])) {
            throw new Exception("Missing openid attribute.");
        }

        preg_match('#(?<mail>(?<uid>[^/@]+)@(?<sHO>[^/@]+))#', $attributes["openid"][0], $matches);

        $request['Attributes']['mail'] = [$matches['mail']];
        $request['Attributes']['uid'] = [$matches['uid']];
        $request['Attributes']['sHO'] = [$matches['sHO']];
	}
}
