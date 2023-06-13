import styled from './styles.module.scss'
import React from 'react';

import {Header} from '@/components/Player/Header';
import {Footer} from "@/components/Player/Footer";
import {Main} from "@/components/Player/Main";

export function Player() {
    return (
        <div className={styled.playerContainer}>
            <Header playingImage="/playing.svg" playingNow="Sound in the box!"/>

            <Main/>

            <Footer/>
        </div>
    )
}