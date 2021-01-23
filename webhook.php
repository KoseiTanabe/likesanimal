<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');

$channelAccessToken = 'N/mUtK9kCank2Hi2Ax0Z2/pbrWSKNmtzvEcS53hoy0gq3iH7JgeHk6lT17DTUbedY762+Lp1SGKSIKlk3p8Aum1/GP4r7vnhK4x+87Jhu+amHQUKyaKhJezQAoDGcJ9vsMQTrVLqI9K73besR4Qu+AdB04t89/1O/w1cDnyilFU=';
$channelSecret = '4bc74b5fba6da8f64cdb3f07363171fb';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
			/* $message['text']の中に送られてきたメッセージが入っている
			   if文を使用しどの動物名を同じコメントなのかを判別 */
			if ($message['text'] === '猫') {
                    		$client->replyMessage([
                        		'replyToken' => $event['replyToken'],
                        		'messages' => [
                            			[
                                			'type' => 'text',
                                			'text' => '猫ちゃんいいですね！柔らかなフォルムが最高です。'
                            			]
                        		]
                    		]);
			}

			if ($message['text'] === '犬') {
                    		$client->replyMessage([
                        		'replyToken' => $event['replyToken'],
                        		'messages' => [
                            			[
                                			'type' => 'text',
                                			'text' => 'ワンちゃんいいですね！甘えん坊で飼い主想いなところが好きです'
                            			]
                        		]
                    		]);
			}

			if ($message['text'] === 'うさぎ') {
                    		$client->replyMessage([
                        		'replyToken' => $event['replyToken'],
                        		'messages' => [
                            			[
                                			'type' => 'text',
                                			'text' => 'うさちゃんフワフワもっちりしていて可愛いですよね！'
                            			]
                        		]
                    		]);
			}

			if ($message['text'] === '猫ひつじ') {
                    		$client->replyMessage([
                        		'replyToken' => $event['replyToken'],
                        		'messages' => [
                            			[
                                			'type' => 'text',
                                			'text' => 'この生き物を知っているなんて！なかなか通ですね！'
                            			]
                        		]
                    		]);
			}
                    break;
                default:
                    error_log('Unsupported message type: ' . $message['type']);
                    break;
            }
            break;
        default:
            error_log('Unsupported event type: ' . $event['type']);
            break;
    }
};
